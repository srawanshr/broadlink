<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use App\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

use App\Http\Requests;

class CartController extends Controller
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
                    'pinId' => $this->getUnusedPin()->id
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

    public function checkout($method, AppMailer $mailer)
    {
        if ( auth()->guard('user')->check() ) {
            $cartTotal = Cart::discountedTotal () + Cart::vatTotal ( Invoice::getVat () );
            $customer =  auth()->guard('user')->user();

            $this->verifyCartPin();

            $invoice = $this->pavVia($method);

            $mailer->sendInvoiceMailTo($customer);
            
        } else {
            return redirect ()->guest ( 'login' )->withWarning ( trans('auth.required') );
        }
    }

    public function getUnusedPin()
    {
        $pin = Pin::notUsed()->random();

        if($pin) {
            return $pin;
        } else {
            throw new Exception('Product out of stock. Please contact support!.');
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
                                    'pinId' => $this->getUnusedPin()->id;
                                ]
                            ]);
                        }
                    }
                }
            }
        }
    }

    public function payVia($method)
    {
        return true;
    }
}
