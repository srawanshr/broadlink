@extends('backend.layout')

@section('title', 'Post')

@push('styles')
<link href="{{ asset('assets/plugins/kendo-ui/styles/kendo.common-material.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/kendo-ui/styles/kendo.material.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/backend/skins/dropify/css/dropify.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            {{ Form::model($post, [ 'route' => ['admin::post.update', $post->slug], 'class' => 'uk-form-stacked', 'id' => 'post_edit_form', 'files' => true, 'method' => 'put' ]) }}
            @include('backend.post.partials.form', [ 'title' => 'Edit Post' ])
            {{ Form::close() }}
        </div>
    </div>
@stop

@push('scripts')
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/forms_wysiwyg.min.js') }}"></script>
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/js/pages/forms_file_input.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/js/kendoui_custom.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/kendoui.min.js') }}"></script>
<script>
    $('.selectpicker').selectize({
        plugins: {
            'remove_button': {
                label: ''
            }
        },
        maxItems: null,
        valueField: 'id',
        labelField: 'title',
        searchField: 'title',
        create: false,
        render: {
            option: function (data, escape) {
                return '<div class="option">' +
                    '<span class="title">' + escape(data.title) + '</span>' +
                    '</div>';
            },
            item: function (data, escape) {
                return '<div class="item"><a href="' + escape(data.url) + '" target="_blank">' + escape(data.title) + '</a></div>';
            }
        },
        onDropdownOpen: function ($dropdown) {
            $dropdown
                .hide()
                .velocity('slideDown', {
                    begin: function () {
                        $dropdown.css({'margin-top': '0'})
                    },
                    duration: 200,
                    easing: easing_swiftOut
                })
        },
        onDropdownClose: function ($dropdown) {
            $dropdown
                .show()
                .velocity('slideUp', {
                    complete: function () {
                        $dropdown.css({'margin-top': ''})
                    },
                    duration: 200,
                    easing: easing_swiftOut
                })
        }
    });

    $('.datetimepicker').kendoDateTimePicker({
        parseFormats: ["yyyy-MM-dd HH:mm:ss"]
    });
</script>
@endpush