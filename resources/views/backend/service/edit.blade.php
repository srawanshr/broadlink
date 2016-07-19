@extends('backend.layout')

@section('title', 'Service')

@push('styles')
    <link href="{{ asset('assets/backend/skins/dropify/css/dropify.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            @include('backend.service.partials.edit-form', [ 'title' => 'Edit Service', 'banners' => true ])
        </div>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/forms_wysiwyg.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/pages/forms_file_input.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', 'item_delete', function() {
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