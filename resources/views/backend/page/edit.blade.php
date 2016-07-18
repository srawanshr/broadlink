@extends('backend.layout')

@section('title', 'Page')

@push('styles')
@endpush

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            {{ Form::model($page, [ 'route' => [ 'admin::page.update', $page->slug ], 'class' => 'uk-form-stacked', 'id' => 'page_edit_form', 'method' => 'put' ]) }}
                @include('backend.page.partials.form')
            {{ Form::close() }}
        </div>
    </div>
@stop

@push('scripts')
    <!-- tinymce -->
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>

    <script src="{{ asset('assets/backend/js/pages/forms_wysiwyg.min.js') }}"></script>
@endpush