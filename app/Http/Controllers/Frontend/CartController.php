<?php

namespace App\Http\Controllers\Frontend;

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
        Cart::add([
            'name' => $product->name,
            'qty' => 1,
            'discount' => 0,
            'price' => $product->price,
            'options' => [
                'service' => $service,
                'product' => $product
            ]
        ]);

        return redirect()->back()->withSuccess($product->name.' added to your cart!');
    }

    public function delete( $id )
    {
        Cart::remove ( $id );

        return redirect ()->back ()->withSuccess ( 'Item removed!' );
    }
}
