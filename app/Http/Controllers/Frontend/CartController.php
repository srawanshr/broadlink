<?php

namespace App\Http\Controllers\Frontend;

use App\Facades\Cart;
use App\Http\Controllers\URLCrawler;
use App\Http\Requests\CheckoutRequest;
use App\Mailers\AppMailer;
use App\Models\EsewaPayment;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Pin;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class CartController extends URLCrawler {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.cart.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        Cart::remove($id);

        return redirect()->back()->withSuccess('Item removed!');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getCheckout()
    {
        if (Cart::count() == 0)
            return redirect()->back()->withWarning('No Item in Cart!');

        if (auth()->guard('user')->check())
            return view('frontend.cart.payment');

        return redirect()->guest('login')->withWarning(trans('auth.required'));
    }

    /**
     * @param CheckoutRequest $request
     */
    public function postCheckout(CheckoutRequest $request)
    {
        $cartTotal = Cart::discountedTotal() + Cart::vatTotal(config('broadlink.vat'));;

        $method = 'payVia' . ucwords($request->get('method'));

        $this->{$method}($cartTotal);
    }

    /**
     * @param $price
     * @return bool
     */
    public function getUnusedPin($price)
    {
        $pin = Pin::notUsed()->get()->filter(function ($item) use ($price)
        {
            return intval(filter_var($item->voucher, FILTER_SANITIZE_NUMBER_INT)) == $price;
        });

        if ($pin->isEmpty())
        {
            return false;
        } else
        {
            return $pin->random();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return redirect()->back()->withSuccess('Item removed!');
    }

    /**
     * @param Request $request
     * @param AppMailer $mailer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function esewaRedirect(Request $request, AppMailer $mailer)
    {
        DB::beginTransaction();

        $paidAmt = $request->get('amt', false);
        $principleAmt = Cart::total();

        $totalAmt = $principleAmt + config('broadlink.vat') * $principleAmt;

        $refId = $request->get('refId', false);

        $payment = EsewaPayment::create([
            'ref_id' => $refId
        ]);

        if ($paidAmt == $totalAmt && $this->verifyEsewaTransaction($paidAmt, $refId) && auth()->guard('user')->check())
        {

            $invoice = $this->generateInvoice($payment);

            $this->createOrders($invoice, Cart::content());

            $mailer->sendInvoiceMail($invoice);
            Cart::destroy();
            DB::commit();

            return redirect()->route('user::dashboard')->withSuccess('Purchase Successful. Order details can be viewed in Purchase History.');
        } else
        {
            DB::rollBack();

            return redirect()->route('cart::index')->withWarning('Payment Unsuccessful. Please try again later');
        }
    }

    /**
     * @param $amt
     * @param $rfId
     * @return bool
     */
    public function verifyEsewaTransaction($amt, $rfId)
    {
        return true;
        //create array of data to be posted
        $post_data['amt'] = $amt;
        $post_data['scd'] = config('broadlink.esewa.' . config('broadlink.esewa.mode') . '.merchant_id');
        $post_data['pid'] = $this->getProductId();
        $post_data['rid'] = $rfId;

        $request = $this->httpPost(config('broadlink.esewa.' . config('broadlink.esewa.mode') . '.verification_url'), $post_data);

        $crawler = new Crawler($request);
        $response = strtoupper(trim($crawler->filter('response_code')->first()->text()));
        if (strcmp('SUCCESS', $response) == 0)
            return true;
        else
            return false;
    }

    /**
     * @return string
     */
    public function getProductId()
    {
        $timestamp = date('YmdHis');
        $suffix = Cart::content()->implode('name', '-');

        return $timestamp . '-' . $suffix;
    }

    /**
     * @param $payment
     * @return mixed
     */
    public function generateInvoice($payment)
    {
        $payment->update(['is_verified' => 1]);

        $invoice = $payment->invoice()->create([
            'payable_id' => $payment->id,
            'sub_total'  => Cart::total(),
            'vat'        => config('broadlink.vat') * Cart::total(),
            'total'      => Cart::total() * (1 + config('broadlink.vat')),
        ]);

        return $invoice;
    }

    private function createOrders(Invoice $invoice, $content)
    {
        foreach ($content as $order)
        {
            $pin = $this->getUnusedPin($order->price);

            if ($pin)
            {
                $invoice->orders()->create([
                    'name'    => 'Broadlink Voucher - ' . $order->price,
                    'user_id' => $invoice->user->id,
                    'pin_id'  => $pin->id,
                    'price'   => $order->price,
                    'status'  => Order::COMPLETED
                ]);
                $pin->update(['is_used' => true]);
            } else
            {
                $invoice->orders()->create([
                    'name'    => 'Broadlink Voucher - ' . $order->price,
                    'user_id' => $invoice->user->id,
                    'pin_id'  => null,
                    'price'   => $order->price,
                    'status'  => Order::ERROR
                ]);
            }
        }
    }

    /**
     * @param Float $amount
     */
    private function payViaEsewa($amount = 0.0)
    {
        $principle = round($amount / (1 + config('broadlink.vat')), 2); // total = amt + vat * amt
        $vatAmt = $amount - $principle;

        $html = "<form id='esewa' action='" . config('broadlink.esewa.' . config('broadlink.esewa.mode') . '.url') . "' method='POST'>" .
            "<input value='$amount' name='tAmt' type='hidden'>" .
            "<input value='$principle'  name='amt' type='hidden'>" .
            "<input value='$vatAmt' name='txAmt' type='hidden'>" .
            "<input value='0' name='psc' type='hidden'>" .
            "<input value='0' name='pdc' type='hidden'>" .
            "<input value='" . config('broadlink.esewa.' . config('broadlink.esewa.mode') . '.merchant_id') . "' name='scd' type='hidden'>" .
            "<input value='" . $this->getProductId() . "' name='pid' type='hidden'>" .
            "<input value='" . route('esewa::success') . "' type='hidden' name='su'>" .
            "<input value='" . route('esewa::success') . "' type='hidden' name='fu'>" .
            "</form>" .
            "<script type=\"text/javascript\">" .
            "document.getElementById('esewa').submit();" .
            "</script>";

        echo $html;
    }
}
