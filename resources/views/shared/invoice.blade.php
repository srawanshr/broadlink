<!doctype html>
<!--[if lte IE 9]>
<html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">

    <title>{{ config('website.title') }} - Invoice</title>


    <!-- uikit -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/uikit/css/uikit.almost-flat.min.css') }}" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/main.min.css') }}" media="all">

    <!-- my theme -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/my_theme.min.css') }}" media="all">

    <!-- matchMedia polyfill for testing media queries in JS --><!--[if lte IE 9]>
    <script type="text/javascript" src="{{ asset('assets/plugins/matchMedia/matchMedia.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/matchMedia/matchMedia.addListener.js') }}"></script>
    <![endif]-->

</head>
<body style="padding-top: 0;">

<div id="page_content">
    <div id="page_content_inner">

        <div class="uk-width-medium-1-1 uk-container-center reset-print">
            <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
                <div class="uk-width-medium-1-1">
                    <div class="md-card md-card-single main-print" id="invoice">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions hidden-print">
                                <i class="md-icon material-icons" id="invoice_print">&#xE8ad;</i>
                            </div>
                            <h3 class="md-card-toolbar-heading-text large" id="invoice_name">
                                Invoice {{ $invoice->slug }}
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <div class="uk-margin-medium-bottom">
                                <span class="uk-text-muted uk-text-small uk-text-italic">Date:</span> {{ $invoice->created_at->format('d.m.Y') }}
                            </div>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-small-3-5">
                                    <div class="uk-margin-bottom">
                                        <span class="uk-text-muted uk-text-small uk-text-italic">From:</span>
                                        <address>
                                            <p><strong>{!! setting('name') !!}</strong></p>
                                            <p>{!! setting('address') !!}</p>
                                            <p>{!! setting('phone') !!}</p>
                                            <p>{!! setting('email') !!}</p>
                                            <p>{!! setting('gpo') !!}</p>
                                        </address>
                                    </div>
                                    <div class="uk-margin-medium-bottom">
                                        <span class="uk-text-muted uk-text-small uk-text-italic">To:</span>
                                        <address>
                                            <p><strong>{{ $invoice->user->display_name }}</strong></p>
                                            <p>{{ $invoice->user->address }}</p>
                                            <p>{{ $invoice->user->email }}</p>
                                            @unless(empty($invoice->user->phone))
                                                <p>{{ $invoice->user->phone }}</p>
                                            @endunless
                                        </address>
                                    </div>
                                </div>
                                <div class="uk-width-small-2-5">
                                    <span class="uk-text-muted uk-text-small uk-text-italic">Total:</span>
                                    <p class="heading_b uk-text-success">{{ 'Rs.'.$invoice->total }}</p>
                                    <p class="uk-text-small uk-text-muted uk-margin-top-remove">Incl. VAT
                                        - {{ 'Rs.'.($invoice->total - $invoice->sub_total) }}</p>
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>Order ID</th>
                                            <th>Product</th>
                                            <th class="uk-text-center">Price</th>
                                            <th class="uk-text-center">Quantity</th>
                                            <th class="uk-text-center">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($invoice->orders->groupBy('name') as $key => $order)
                                            <tr class="uk-table-middle">
                                                <td>
                                                    {{ $order->implode('id', ',') }}
                                                </td>
                                                <td>
                                                    {{ $key }}
                                                </td>
                                                <td class="uk-text-center">
                                                    {{ 'Rs.'.$order->first()->price }}
                                                </td>
                                                <td class="uk-text-center">
                                                    {{ $order->count() }}
                                                </td>
                                                <td class="uk-text-center">
                                                    {{ 'Rs.'.$order->sum('price') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="4" class="uk-text-right">Total:</td>
                                            <td class="uk-text-center">{{ 'Rs.'.$invoice->orders->sum('price') }}</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <span class="uk-text-muted uk-text-small uk-text-italic">Payment method:</span>
                                    <p class="uk-margin-top-remove">
                                        {{ $invoice->payable_type }}
                                    </p>
                                    <p class="uk-text-small">Payment Complete</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- BEGIN CORE SCRIPTS -->
<!-- google web fonts -->
<script>
    var sSwfPath = "/assets/plugins/datatables-tabletools/swf/copy_csv_xls_pdf.swf";
    WebFontConfig = {
        google: {
            families: [
                'Source+Code+Pro:400,700:latin',
                'Roboto:400,300,500,700,400italic:latin'
            ]
        }
    };
    (function () {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>

<!-- common functions -->
<script src="{{ asset('assets/backend/js/common.min.js') }}"></script>

<!-- uikit functions -->
<script src="{{ asset('assets/backend/js/uikit_custom.min.js') }}"></script>

<!-- altair common functions/helpers -->
<script src="{{ asset('assets/backend/js/altair_admin_common.min.js') }}"></script>
<!-- END CORE SCRIPTS -->

<script>
    $(function () {
        // enable hires images
        altair_helpers.retina_images();
        // fastClick (touch devices)
        if (Modernizr.touch) {
            FastClick.attach(document.body);
        }

        // init invoices
        altair_invoices.init();
    });

    altair_invoices = {
        init: function () {
            // print invoice btn
            altair_invoices.print_invoice();
        },
        print_invoice: function () {
            $body.on('click', '#invoice_print', function (e) {
                e.preventDefault();
                UIkit.modal.confirm('Do you want to print this invoice?', function () {
                    // wait for dialog to fully hide
                    setTimeout(function () {
                        window.print();
                    }, 300)
                }, {
                    labels: {
                        'Ok': 'print'
                    }
                });
            })
        }
    }
</script>

</body>
</html>