<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
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
        return Datatables::of(Order::select('id', 'name', 'invoice_id', 'user_id', 'pin_id', 'status', 'price', 'created_at'))
            ->addColumn('customer', function ($order)
            {
                return $order->user->display_name;
            })
            ->addColumn('pin', function ($order)
            {
                return $order->pin->pin;
            })
            ->addColumn('sno', function ($order)
            {
                return $order->pin->sno;
            })
            ->addColumn('payment_method', function ($order)
            {
                return $order->invoice ? $order->invoice->payable_type : 'NA';
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

    /**
     * Report Generate by date range
     * @param Request $request
     * @return mixed
     */
    public function report(Request $request)
    {
        $from = Carbon::createFromFormat('d.m.Y H:i:s', $request->get('from', date('d.m.Y')) . '00:00:00');
        $to = Carbon::createFromFormat('d.m.Y H:i:s', $request->get('to', date('d.m.Y')) . '23:59:59');

        $orders = Order::whereBetween('created_at', [$from, $to])->get();

        return view('backend.order.report', compact('orders', 'from', 'to'));
    }
}
