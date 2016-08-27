<?php

namespace App\Http\Controllers\Frontend;

use App\Facades\Cart;
use App\Models\Pin;
use App\Models\Product;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VoucherController extends Controller
{
    public function index()
    {
        return view('frontend.voucher.index');
    }

    public function show($voucher)
    {
        $pinsCount = Pin::notUsed()->get()->filter(function($item) use ($voucher){
           return str_slug($item->voucher) == $voucher;
        })->count();

        if($pinsCount > 0)
            return view('frontend.voucher.show', compact('pinsCount', 'voucher'));
        else
            return redirect()->back()->withWarning('Pins out of stock');
    }

    public function buy( Service $service, Product $product )
    {
        try {

            Cart::add( [
                'name'     => $product->name,
                'qty'      => 1,
                'discount' => 0,
                'price'    => $product->price,
                'options'  => [
                    'service' => $service,
                    'product' => $product,
                    'pinId'   => $this->getUnusedPin( $product->price )
                ]
            ] );

            return redirect()->back()->withSuccess( $product->name . ' added to your cart!' );
        } catch (Exception $e) {
            return redirect()->back()->withWarning( 'Cannot add data to cart. ' . $e->getMessage() );
        }
    }
}
