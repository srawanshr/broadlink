@extends('backend.layout')

@section('title', 'Client')

@push('styles')
    <link href="{{ asset('assets/backend/skins/dropify/css/dropify.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            {{ Form::open([ 'route' => 'admin::client.store', 'class' => 'uk-form-stacked', 'id' => 'client_create_form', 'files' => true ]) }}
                @include('backend.client.partials.form', [ 'title' => 'Create Product' ])
            {{ Form::close() }}
        </div>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/forms_wysiwyg.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/pages/forms_file_input.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            function showClients(selectedServiceId) {
                $(".plan_list").addClass("uk-hidden");
                $(".plan_list[data-service-id="+selectedServiceId+"]").removeClass("uk-hidden");
            }

            $(document).on("ifChanged", "input[name='service_id']", function () {
                var selectedServiceId = $(this).val();
                showClients(selectedServiceId);
            });
            $("input[name='service_id']:first").iCheck('check');
        });
    </script>
@endpush