@extends('backend.layout')

@section('title', 'Pin')

@push('styles')
<link href="{{ asset('assets/backend/skins/dropify/css/dropify.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div id="page_content">
        <div id="page_content_inner">            
            @include('backend.pin.partials.form', [ 'title' => 'Edit Pin' ])
        </div>
    </div>
@stop

@push('scripts')
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/js/pages/forms_file_input.min.js') }}" type="text/javascript"></script>
@endpush