<?php

namespace App\Http\Controllers\Backend;

use Datatables;
use App\Models\Order;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.order.index');
    }

    /**
     * @return mixed
     */
    public function orderList()
    {
        return Datatables::of(Order::all())
            ->addColumn('customer', function ($order)
            {
                return $order->user->display_name;
            })
            ->addColumn('pin', function ($order)
            {
                return $order->pin->pin;
            })
            ->editColumn('created_at', function ($order)
            {
                return $order->created_at->format('Y-m-d');
            })
            ->editColumn('status', function ($order)
            {
                return $order->status ? 'Completed' : 'Pending';
            })
            ->addColumn('action', function ($order)
            {
                $button = '<a href="' . route('invoice::show', $order->invoice->slug) . '" data-uk-tooltip="{pos:\'left\'}" title="View Invoice" target="_blank"><i class="material-icons">&#xE8AD;</i></a>';

                return $button;
            })
            ->make(true);
    }
}
