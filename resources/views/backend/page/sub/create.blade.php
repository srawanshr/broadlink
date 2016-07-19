@extends('backend.layout')

@section('title', 'SubPage')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            {{ Form::open([ 'route' => [ 'admin::page.sub.store', $page->slug ], 'class' => 'uk-form-stacked', 'id' => 'sub_page_create_form' ]) }}
                @include('backend.page.partials.form', [ 'title' => 'Create SubPage (Page: '.$page->title.')' ])
            {{ Form::close() }}
        </div>
    </div>
@stop

@push('scripts')
<!-- tinymce -->
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>

<script src="{{ asset('assets/backend/js/pages/forms_wysiwyg.min.js') }}"></script>
@endpush