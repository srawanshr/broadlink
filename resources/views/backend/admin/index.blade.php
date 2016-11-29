@extends('backend.layout')

@section('title', 'Users')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/backend/skins/jquery-ui/material/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/skins/jtable/jtable.min.css') }}">
@endpush

@section('content')
    <div id="page_content">
        <div id="page_content_inner">

            <h3 class="heading_b uk-margin-bottom">All Users</h3>

            <div class="md-card">
                <div class="md-card-content">
                    <div id="admin_crud"></div>
                </div>
            </div>

        </div>
    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-accent" href="#" id="recordAdd" data-uk-tooltip="{pos:'left'}" title="Create User">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/jtable/lib/jquery.jtable.min.js') }}"></script>

    @include('backend.admin.partials.table-script')
@endpush