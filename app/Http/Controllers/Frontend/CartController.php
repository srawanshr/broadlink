<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use App\Models\Pin;
use App\Facades\Cart;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Mailers\AppMailer;
use App\Http\Controllers\URLCrawler;
use App\Http\Requests\CheckoutRequest;
use Symfony\Component\DomCrawler\Crawler;

use App\Http\Requests;

class CartController extends URLCrawler
{
    public function index()
    {
        return view('frontend.cart.index');
    }

    public function buy ( Service $service, Product $product )
    {
        try {

            Cart::add([
                'name' => $product->name,
                'qty' => 1,
                'discount' => 0,
                'price' => $product->price,
                'options' => [
                    'service' => $service,
                    'product' => $product,
                    'pinId' => $this->getUnusedPin($product->price)
                ]
            ]);
            
            return redirect()->back()->withSuccess($product->name.' added to your cart!');
        }
        catch (Exception $e)
        {
            return redirect()->back()->withWarning('Cannot add data to cart. '.$e->getMessage());
        }
    }

    public function delete( $id )
    {
        Cart::remove ( $id );

        return redirect ()->back ()->withSuccess ( 'Item removed!' );
    }

    public function getCheckout()
    {
        if( Cart::count() == 0 )
            return redirect()->back()->withWarning('No Item in Cart!');
        
        if(auth()->guard('user')->check())
            return view('frontend.cart.payment');
        
        return redirect ()->guest ( 'login' )->withWarning ( trans('auth.required') );
    }

    public function postCheckout(CheckoutRequest $request, AppMailer $mailer)
    {
        $cartTotal = Cart::discountedTotal () + Cart::vatTotal ( config('broadlink.vat') );
        $customer =  auth()->guard('user')->user();
        $method = 'payVia'.ucwords($request->get('method'));

        $this->verifyCartPin();

        $this->{$method}($customer, $cartTotal);
    }

    public function getUnusedPin($price)
    {
        $pin = Pin::notUsed()->get()->filter(function($item) use ($price) {
            return intval(filter_var($item->voucher, FILTER_SANITIZE_NUMBER_INT)) == $price;
        });

        if($pin->isEmpty()) {
            throw new Exception('Product out of stock. Please contact support!.');
        } else {
            return $pin->random()->id;
        }
    }

    public function verifyCartPin()
    {
        foreach (Cart::content() as $id => $item) {
            if( !empty($item->options) ){
                if( !empty($item->options->pinId) ) {
                    if( $pin = Pin::find( $pinId ) ) {
                        if( $pin->is_used ) {
                            Cart::update($id, [
                                'options' => [
                                    'pinId' => $this->getUnusedPin($item->options->product->price)
                                ]
                            ]);
                        }
                    }
                }
            }
        }
    }

    /**
     * @param Float $amount
     */
    private function payViaEsewa ( $customer, $amount = 0.0 )
    {
        $principle = round ( $amount / (1 + config('broadlink.vat')), 2 ); // total = amt + vat * amt
        $vatAmt = $amount - $principle;

        $html = "<form id='esewa' action='" . config ('broadlink.esewa.' . config ('broadlink.esewa.mode') . '.url') . "' method='POST'>" .
            "<input value='$amount' name='tAmt' type='hidden'>" .
            "<input value='$principle'  name='amt' type='hidden'>" .
            "<input value='$vatAmt' name='txAmt' type='hidden'>" .
            "<input value='0' name='psc' type='hidden'>" .
            "<input value='0' name='pdc' type='hidden'>" .
            "<input value='". config ('broadlink.esewa.' . config ('broadlink.esewa.mode') . '.merchant_id') ."' name='scd' type='hidden'>" .
            "<input value='" . $this->getProductId() . "' name='pid' type='hidden'>" .
            "<input value='" . route('esewa::success') . "' type='hidden' name='su'>" .
            "<input value='" . route('esewa::success') . "' type='hidden' name='fu'>" .
            "</form>" .
            "<script type=\"text/javascript\">" .
            "document.getElementById('esewa').submit();" .
            "</script>";

        echo $html;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy ( $id )
    {
        Cart::remove ( $id );

        return redirect ()->back ()->withSuccess ( 'Item removed!' );
    }

    /**
     * @param Request $request
     * @param AppMailer $mailer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function esewaRedirect ( Request $request, AppMailer $mailer )
    {
        $paidAmt = $request->get ( 'amt', false );
        $principleAmt = Cart::total();
        
        $totalAmt = $principleAmt + config('broadlink.vat') * $principleAmt;

        $refId = $request->get ( 'refId', false );

        $payment = EsewaPayment::create([
            'ref_id' => $refId
        ]);

        if ( $paidAmt == $totalAmt && $this->verifyEsewaTransaction ( $paidAmt, $refId ) && auth()->guard('user')->check () ) {

           $invoice = $this->generateInvoice($payment);

            return redirect ()->route ( 'invoice.show', $invoice->code );
        } else {
            return redirect ()->route ( 'cart.index' )->withWarning ( 'Payment Unsuccessful. Please try again later' );
        }
    }

    public function generateInvoice($payment)
    {
        $user = auth()->guard('user')->user();
        $payment->update([ 'is_verified' => 1 ]);
        Cart::content()->each(function($item){
           Pin::find($item->options->pinId)->update(['is_used' => 1]);
        });
        
        $invoice = $payment->invoice()->create([
            'payable_id' => $payment->id,
            'user_id'    => $user->id,
            'sub_total'  => Cart::total(),
            'vat'        => config('broadlink.vat') * Cart::total(),
            'total'      => Cart::total() * ( 1 + config('broadlink.vat') ),
            'date'       => date('Y-m-d'),
        ]);

        $mailer->sendInvoiceMailTo($user);

        Cart::destroy();

        return $invoice;
    }

    /**
     * @param $amt
     * @param $rfId
     * @return bool
     */
    public function verifyEsewaTransaction ( $amt, $rfId )
    {
        //create array of data to be posted
        $post_data[ 'amt' ] = $amt;
        $post_data[ 'scd' ] = config ('broadlink.esewa.' . config ('broadlink.esewa.mode') . '.merchant_id');
        $post_data[ 'pid' ] = $this->getProductId();
        $post_data[ 'rid' ] = $rfId;

        $request = $this->httpPost ( config ('broadlink.esewa.' . config ('broadlink.esewa.mode') . '.verification_url'), $post_data );
        $crawler = new Crawler( $request );
        $response = strtoupper ( trim ( $crawler->filter ( 'response_code' )->first ()->text () ) );
        if ( strcmp ( 'SUCCESS', $response ) == 0 )
            return true;
        else
            return false;
    }

    public function getProductId()
    {
        $timestamp = date('YmdHis');
        $suffix = Cart::content()->implode('options.service.name', '-');

        return $timestamp .'-'. $suffix;
    }
}
