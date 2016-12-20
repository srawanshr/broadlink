@extends('backend.layout')

@section('title', 'Pin')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">All Pins</h3>
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right">
                                <i class="material-icons md-48">&#xE06A;</i>
                            </div>
                            <span class="uk-text-muted uk-text-small">Available Total Pin</span>
                            <h2 class="uk-margin-remove">
                                <span>{{ $availablePin }}</span>
                            </h2>
                        </div>
                    </div>
                </div>
                @foreach($usedPins as $voucher => $usedPin)
                    <div>
                        <div class="md-card">
                            <div class="md-card-content">
                                <div class="uk-float-right uk-margin-top uk-margin-small-right">
                                    <i class="material-icons md-48">&#xE06A;</i>
                                </div>
                                <span class="uk-text-muted uk-text-small">{{ $voucher }}</span>
                                <h2 class="uk-margin-remove">
                                    <span>{{ $usedPin }}</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <table id="dt_pin" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Pin</th>
                            <th>Voucher</th>
                            <th>Used</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>Sno</th>
                            <th>Pin</th>
                            <th>Voucher</th>
                            <th>Used</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-accent" href="{{ route('admin::pin.create') }}" id="pinAdd"  data-uk-tooltip="{pos:'left'}" title="Import Pin">
            <i class="material-icons">&#xE145;</i>
        </a>
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

    <script>
        function deleteItem(item) {
            var $row = item.closest("tr");
            $.ajax({
                type: 'post',
                url: item.data('source'),
                data: {_method: 'delete'},
                success: function () {
                    $row.addClass("danger").fadeOut();
                },
                error: function () {
                    UIkit.modal.alert('Remove failed!');
                }
            });
        }

        $(document).on('click', '.item_delete', function() {
            var item = $(this);

            UIkit.modal.confirm('Are you sure?', function() {
                deleteItem(item);
            });
        });
    </script>
@endpush