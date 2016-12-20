@extends('backend.layout')

@section('title', 'Order')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">Order Reports</h3>
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-sortable sortable-handler" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right">
                                <i class="material-icons md-48">&#xE85D;</i>
                            </div>
                            <span class="uk-text-muted uk-text-small">Orders Count</span>
                            <h2 class="uk-margin-remove">
                                <span>{{ $orders->count() }}</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <form method="get" action="{{ route('admin::order.report') }}">
                        {{ csrf_field() }}
                        <h3 class="heading_a">Date range</h3>
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-large-1-3 uk-width-medium-1-1 uk-row-first">
                                <div class="uk-input-group">
                                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                    <div class="md-input-wrapper md-input-filled">
                                        <label for="uk_dp_start">FROM</label>
                                        <input class="md-input" type="text" id="uk_dp_start" name="from" value="{{ isset($from) ? $from->format('d.m.Y') : date('d.m.Y') }}">
                                        <span class="md-input-bar"></span>
                                    </div>

                                </div>
                            </div>
                            <div class="uk-width-large-1-3 uk-width-medium-1-1">
                                <div class="uk-input-group">
                                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                    <div class="md-input-wrapper md-input-filled">
                                        <label for="uk_dp_end">TO</label>
                                        <input class="md-input" type="text" id="uk_dp_end" name="to" value="{{ isset($to) ? $to->format('d.m.Y') : date('d.m.Y') }}">
                                        <span class="md-input-bar"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-large-1-3 uk-width-medium-1-1">
                                <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-wave-light waves-effect waves-button waves-light">
                                    GENERATE REPORT
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <table id="dt_report" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="uk-width-1-10">Order ID</th>
                            <th class="uk-width-3-10">Name</th>
                            <th class="uk-width-2-10">Customer</th>
                            <th class="uk-width-1-10">Serial</th>
                            <th class="uk-width-1-10">Payment</th>
                            <th class="uk-width-1-10 uk-text-center">Status</th>
                            <th class="uk-width-1-10 uk-text-center">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->user->display_name }}</td>
                                <td>{{ $order->pin->sno }}</td>
                                <td>{{ $order->invoice->payable_type }}</td>
                                <td>{{ $order->status ? 'Completed' : 'Pending' }}</td>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
<script src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-tabletools/js/dataTables.tableTools.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom/datatables_uikit.min.js') }}"></script>
<script>
    $(function () {
        // order datatable
        altair_datatables.dt_report();
        // date range
        altair_form_adv.date_range();
    });
    altair_form_adv = {
        date_range: function () {
            var $dp_start = $('#uk_dp_start'),
                $dp_end = $('#uk_dp_end');

            var start_date = UIkit.datepicker($dp_start, {
                format: 'DD.MM.YYYY'
            });

            var end_date = UIkit.datepicker($dp_end, {
                format: 'DD.MM.YYYY'
            });

            $dp_start.on('change', function () {
                end_date.options.minDate = $dp_start.val();
            });

            $dp_end.on('change', function () {
                start_date.options.maxDate = $dp_end.val();
            });
        }
    };

    altair_datatables = {
        dt_report: function () {
            var $dt_report = $('#dt_report');
            if ($dt_report.length) {

                // reinitialize md inputs
                altair_md.inputs();

                // DataTable
                var pin_table = $dt_report.DataTable();

                var tt = new $.fn.dataTable.TableTools(pin_table, {
                    "sSwfPath": window.sSwfPath
                });

                $(tt.fnContainer()).insertBefore($dt_report.closest('.dt-uikit').find('.dt-uikit-header'));

                $body.on('click', function (e) {
                    if ($body.hasClass('DTTT_Print')) {
                        if (!$(e.target).closest(".DTTT").length && !$(e.target).closest(".uk-table").length) {
                            var esc = $.Event("keydown", {keyCode: 27});
                            $body.trigger(esc);
                        }
                    }
                })
            }
        },
    };
</script>
@endpush