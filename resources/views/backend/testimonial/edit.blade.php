@extends('backend.layout')

@section('title', 'Testimonial')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            {{ Form::model($testimonial, [ 'route' => ['admin::testimonial.update', $testimonial->id], 'class' => 'uk-form-stacked', 'id' => 'testimonial_create_form', 'files' => true, 'method' => 'PUT' ]) }}
                @include('backend.testimonial.form', [ 'title' => 'Edit Testimonial' ])
            {{ Form::close() }}
        </div>
    </div>
@stop