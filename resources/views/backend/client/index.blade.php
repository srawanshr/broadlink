@extends('backend.layout')

@section('title', 'Client')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">All Clients</h3>

            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-1-1">
                            <div class="uk-overflow-container">
                                <table id="dt_default" class="uk-table" data-sort-order-url="{{ route('admin::client.sort.order') }}">
                                    <thead>
                                    <tr>
                                        <th class="uk-width-1-6 uk-text-center" data-orderable="false">
                                            Order
                                        </th>
                                        <th class="uk-width-3-6">Name</th>
                                        <th class="uk-width-1-6 uk-text-center">Status</th>
                                        <th class="uk-width-1-6 uk-text-right" data-orderable="false">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clients as $key => $client)
                                        <tr>
                                            <td class="uk-text-center sort_item" data-id="{{ $client->id }}">
                                                <a class="move_item_up" data-uk-tooltip="{pos:'left'}" title="Move Up">
                                                    <i class="material-icons md-24">&#xE5C7;</i>
                                                </a>
                                                <a class="move_item_down" data-uk-tooltip="{pos:'right'}" title="Move Down">
                                                    <i class="material-icons md-24">&#xE5C5;</i>
                                                </a>
                                            </td>
                                            <td class="uk-text-large uk-text-nowrap">{{ $client->name }}</td>
                                            <td class="uk-text-nowrap uk-text-center">
                                                <span class="uk-badge uk-badge-{{ $client->is_published ? 'Success' : 'Default' }}">
                                                    {{ $client->is_active ? 'Published' : 'Unpublished' }}
                                                </span>
                                            </td>
                                            <td class="uk-text-nowrap uk-text-right">
                                                <a href="{{ route('admin::client.edit', $client->slug) }}" data-uk-tooltip="{pos:'left'}" title="Edit">
                                                    <i class="material-icons md-24">&#xE254;</i>
                                                </a>
                                                <a class="item_delete" data-source="{{ route('admin::client.destroy', $client->slug) }}" data-uk-tooltip="{pos:'left'}" title="Delete">
                                                    <i class="material-icons md-24">&#xE872;</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-accent" href="{{ route('admin::client.create') }}" id="clientAdd" data-uk-tooltip="{pos:'left'}" title="Add Client">
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

<script src="{{ asset('assets/backend/js/pages/plugins_datatables.min.js') }}"></script>

<script>
    $(document).ready(function () {
        function updateSortOrder() {
            var order = getOrder();
            $.ajax({
                type: 'post',
                url: $('#dt_default').data('sort-order-url'),
                data: {order: order},
                success: function (response) {
                    showNotify('success', response.Message);
                },
                error: function () {
                    UIkit.modal.alert('Order update failed!');
                }
            });
        }

        function getOrder() {
            var order = [];
            $.each($('.sort_item'), function (index, value) {
                order[index] = $(value).data('id');
            });
            return order;
        }

        $(document).on('click', '.move_item_up,.move_item_down', function () {
            var row = $(this).parents("tr:first");
            if ($(this).is('.move_item_up')) {
                row.insertBefore(row.prev());
            } else if ($(this).is('.move_item_down')) {
                row.insertAfter(row.next());
            }
            updateSortOrder();
        });

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
    });
</script>
@endpush