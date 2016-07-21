@extends('backend.layout')

@section('title', 'Service')

@push('styles')
@endpush

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            {{ Form::open([ 'route' => 'admin::service.store', 'class' => 'uk-form-stacked', 'id' => 'service_create_form' ]) }}
            @include('backend.service.partials.form', [ 'title' => 'Create Service' ])
            {{ Form::close() }}
        </div>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/forms_wysiwyg.min.js') }}"></script>
@endpush