<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{ Html::style('assets/frontend/css/dep.css') }}
    <title>Invoice</title>
</head>
<body>
    <div class="uk-container uk-container-center">
        <table class="uk-table uk-table-condensed">
            <tr><td colspan="2"><h2 class="uk-margin-remove">{{ setting('name') }}</h2></td></tr>
            <tr>
                <td>
                    <table class="uk-table uk-table-condensed">
                        <tr><td>{!! str_replace('|', '<br>', setting('address')) !!}</td></tr>
                        <tr><td>GPO: {!! setting('gpo') !!}</td></tr>
                        <tr><td>Phone: {!! setting('phone') !!}</td></tr>
                        <tr><td>Fax: {!! setting('fax') !!}</td></tr>
                        <tr><td>Email: {!! setting('email') !!}</td></tr>
                    </table>
                </td>
                <td class="uk-text-right">
                    <table class="uk-table uk-table-condensed">
                        <tr><td><b>Date Added:</b></td><td>{{ $invoice->date }}</td></tr>
                        <tr><td><b>Invoice Id:</b></td><td>{{ $invoice->id }}</td></tr>
                        <tr><td><b>Payment Method:</b></td><td>{{ $invoice->payable_type }}</td></tr>
                        <tr><td><b>Payment Status:</b></td><td>Completed</td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="uk-panel uk-panel-box">
                        <h3 class="uk-panel-title">To</h3>
                        <div>Name:{{ $invoice->user->display_name }}</div>
                        <div>Email:{{ $invoice->user->email }}</div>
                        <div>Address:{{ $invoice->user->address }}</div>
                        <div>Country: Nepal</div>
                        <div>Phone:{{ $invoice->user->phone }}</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table class="uk-table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach($invoice->orders->groupBy('name') as $key => $order)
                                <tr>
                                    <td>{{ ++$count }}</td>
                                    <td>{{ $key }}</td>
                                    <td>{{  $order->first()->price }}</td>
                                    <td>{{ $order->count() }}</td>
                                    <td>{{ $order->sum('price') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="uk-text-right">Total:</td>
                                <td>{{ $invoice->orders->sum('price') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>