@extends('backend.layout')

@section('title', 'Page')

@push('styles')
@endpush

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">All Pages</h3>

            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-1-1">
                            <div class="uk-overflow-container">
                                <table id="dt_default" class="uk-table">
                                    <thead>
                                        <tr>
                                            <th class="uk-width-2-6">Title</th>
                                            <th class="uk-width-1-6 uk-text-center">Type</th>
                                            <th class="uk-width-1-6 uk-text-center">Author</th>
                                            <th class="uk-width-1-6 uk-text-center">Status</th>
                                            <th class="uk-width-2-6 uk-text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pages as $page)
                                            <tr>
                                                <td class="uk-text-large uk-text-nowrap">{{ $page->title }}</td>
                                                <td class="uk-text-nowrap uk-text-center">Page</td>
                                                <td class="uk-text-nowrap uk-text-center">{{ $page->author->display_name }}</td>
                                                <td class="uk-text-nowrap uk-text-center"><span class="uk-badge uk-badge-{{ $page->is_draft ? 'Default' : 'Success' }}">{{ $page->is_draft ? 'Draft' : 'Published' }}</span></td>
                                                <td class="uk-text-nowrap uk-text-center">
                                                    <a href="{{ route('admin::page.sub.create', $page->id) }}" data-uk-tooltip="{pos:'left'}" title="New Subpage">
                                                        <i class="material-icons md-24">&#xE7F9;</i>
                                                    </a>
                                                    <a href="{{ route('admin::page.edit', $page->id) }}" data-uk-tooltip="{pos:'left'}" title="Edit Page">
                                                        <i class="material-icons md-24">&#xE254;</i>
                                                    </a>
                                                    @unless($page->is_primary)
                                                    <a class="item_delete" data-source="{{ route('admin::page.destroy', $page->slug) }}" data-uk-tooltip="{pos:'left'}" title="Delete Page">
                                                        <i class="material-icons md-24">&#xE872;</i>
                                                    </a>
                                                    @endunless
                                                </td>
                                            </tr>
                                            @foreach($page->subPages as $sub)
                                                <tr>
                                                    <td class="uk-text-large uk-text-nowrap">{{ $sub->title }}</td>
                                                    <td class="uk-text-nowrap">Sub Page</td>
                                                    <td class="uk-text-nowrap">{{ $sub->author->display_name }}</td>
                                                    <td class="uk-text-nowrap"><span class="uk-badge uk-badge-{{ $sub->is_draft ? 'Default' : 'Success' }}">{{ $sub->is_draft ? 'Draft' : 'Published' }}</span></td>
                                                    <td class="uk-text-nowrap">
                                                        <a href="{{ route('admin::page.sub.edit', $page->id, $sub->id) }}" data-uk-tooltip="{pos:'left'}" title="Edit Sub Page">
                                                            <i class="material-icons md-24">&#xE254;</i>
                                                        </a>
                                                        <a class="item_delete" data-source="{{ route('admin::page.sub.destroy', $page->slug, $sub->slug) }}" data-uk-tooltip="{pos:'left'}" title="Delete Sub Page">
                                                            <i class="material-icons md-24">&#xE872;</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
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
        <a class="md-fab md-fab-accent" href="{{ route('admin::page.create') }}" id="pageAdd">
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
            $(document).on('click', '.item_delete', function() {
                var p = $(this);

                UIkit.modal.confirm('Are you sure?', function() {
                    $.ajax({
                        type: 'post',
                        url: p.data('source'),
                        data: { _method: 'delete' },
                        success: function (response) {

                            location.reload();

                        },
                        error: function (response) {
                            
                            UIkit.model.alert('Remove failed!');

                        }
                    });
                });
            });
        });
    </script>
@endpush