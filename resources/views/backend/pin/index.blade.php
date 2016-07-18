@extends('backend.layout')

@section('title', 'Pin')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">All Pins</h3>
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <table id="dt_pin" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Pin</th>
                            <th>Voucher</th>
                            <th>Used</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>Sno</th>
                            <th>Pin</th>
                            <th>Voucher</th>
                            <th>Used</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <!-- datatables -->
    <script src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <!-- datatables tableTools-->
    <script src="{{ asset('assets/plugins/datatables-tabletools/js/dataTables.tableTools.js') }}"></script>
    <!-- datatables custom integration -->
    <script src="{{ asset('assets/backend/js/custom/datatables_uikit.min.js') }}"></script>

    @include('backend.pin.partials.table-script')
@endpush