<?php

namespace App\Http\Controllers\Frontend;

use App\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Pin;
use Exception;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        return view( 'frontend.voucher.index' );
    }

    public function show( $voucher )
    {
        if ( $this->pinCount( $voucher ) > 0 )
            return view( 'frontend.voucher.show', compact( 'pinsCount', 'voucher' ) );
        else
            return redirect()->back()->withWarning( 'Pins out of stock' );
    }

    public function pinCount( $voucher = FALSE )
    {
        if ( $voucher )
            return Pin::notUsed()->get()->filter( function( $item ) use ( $voucher ) {
                return str_slug( $item->voucher ) == $voucher;
            } )->count();
        else
            return Pin::notUsed()->count();
    }

    public function buy( $voucher, Request $request )
    {
        try {
            $qty = $request->get( 'qty', 1 );

            if ( $this->pinCount( $voucher ) > 0 ) {
                Cart::add( [
                    'name'     => $voucher,
                    'qty'      => $qty,
                    'discount' => 0,
                    'price'    => $this->voucherPrice( $voucher ),
                    'options'  => []
                ] );
            }

            return redirect()->back()->withSuccess( $voucher . ' voucher added to your cart!' );
        } catch (Exception $e) {
            return redirect()->back()->withWarning( 'Cannot add data to cart. ' . $e->getMessage() );
        }
    }

    public function voucherPrice( $voucher )
    {
        return abs(intval( filter_var( $voucher, FILTER_SANITIZE_NUMBER_INT ) ));
    }
}
