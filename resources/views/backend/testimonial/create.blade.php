@extends('backend.layout')

@section('title', 'Testimonial')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            {{ Form::open([ 'route' => 'admin::testimonial.store', 'class' => 'uk-form-stacked', 'id' => 'testimonial_create_form', 'files' => true ]) }}
                @include('backend.testimonial.form', [ 'title' => 'Create Testimonial' ])
            {{ Form::close() }}
        </div>
    </div>
@stop