@extends('backend.layout')

@section('title', 'Uploads')

@push('styles')
    <link href="{{ asset('assets/backend/skins/dropify/css/dropify.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">All Uploads</h3>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-1-1">
                            <ul class="breadcrumb folder-paths">
                                @foreach ($breadcrumbs as $path => $disp)
                                    <li><a href="/admin/upload?folder={{ $path }}">{{ $disp }}</a></li>
                                @endforeach
                                <li class="active">{{ $folderName }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="md-fab-wrapper md-fab-in-card">
                        <div class="md-fab md-fab-accent md-fab-sheet">
                            <i class="material-icons">&#xE05E;</i>
                            <div class="md-fab-sheet-actions">
                                <a href="#" class="md-color-white" data-uk-modal="{target:'#modal-file-upload'}">
                                    <i class="material-icons md-color-white">&#xE89C;</i> New File
                                </a>
                                <a href="#" class="md-color-white" data-uk-modal="{target:'#modal-folder-create'}">
                                    <i class="material-icons md-color-white">&#xE2CC;</i> New Folder
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-1-1">
                            <div class="uk-overflow-container">
                                <table class="uk-table uk-text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="uk-width-3-10">Name</th>
                                            <th class="uk-width-2-10 uk-text-center">Type</th>
                                            <th class="uk-width-1-10 uk-text-center">Size</th>
                                            <th class="uk-width-2-10 uk-text-center">Date</th>
                                            <th class="uk-width-2-10 uk-text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(empty($files) && empty($subfolders))
                                            <tr><td>Folder <em>{{ $folderName }}</em> is empty.</td></tr>
                                        @else
                                            @include('backend.upload.partials.folders-row')
                                            @include('backend.upload.partials.files-row')
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.upload.partials.modals.folders.create')
    @include('backend.upload.partials.modals.folders.delete')
    @include('backend.upload.partials.modals.files.create')
    @include('backend.upload.partials.modals.files.delete')
@stop

@push('scripts')
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/pages/forms_file_input.min.js') }}"></script>
    <script type="text/javascript">
        $(document).on('click', '.delete-file', function() {
            var name = $(this).data('name');
            $("#delete-file-name1").html(name);
            $("#delete-file-name2").val(name);
        });

        $(document).on('click', '.delete-folder', function() {
            var name = $(this).data('name');
            $("#delete-folder-name1").html(name);
            $("#delete-folder-name2").val(name);
        });
    </script>
@endpush