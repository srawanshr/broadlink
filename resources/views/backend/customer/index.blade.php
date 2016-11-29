@extends('backend.layout')

@section('title', 'Customer')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">All Customers</h3>
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <table id="dt_customer" class="uk-table" cellspacing="0" width="100%" data-source="{{ route('admin::customer.list') }}">
                        <thead>
                        <tr>
                            <th class="uk-width-2-6">Name</th>
                            <th class="uk-width-1-6">Address</th>
                            <th class="uk-width-1-6">Phone</th>
                            <th class="uk-width-2-6">Email</th>
                        </tr>
                        </thead>
                        <tbody>
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
@include('backend.customer.partials.table-script')
<script>
    function deleteItem(item) {
        $.ajax({
            type: 'post',
            url: item.data('source'),
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            },
            error: function () {
                UIkit.modal.alert('Remove failed!');
            }
        });
    }

    $(document).on('click', '.item_delete', function () {
        var item = $(this);

        UIkit.modal.confirm('Are you sure?', function () {
            deleteItem(item);
        });
    });
</script>
@endpush