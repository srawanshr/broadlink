@extends('admin.layouts.master')

@section('title', 'Clients | Edit')

@section('content')
    <div class="card">
        <div class="card-head">
            <header>Edit a client</header>
            <div class="tools">
                <a class="btn btn-default btn-ink" href="{{ route('admin.client.index') }}"><i
                            class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        {!! Form::model($client, ['route' => ['admin.client.update', $client->slug], 'class' => 'form form-validate', 'role' => 'form', 'novalidate' => 'novalidate', 'files' => true, 'method' => 'PUT']) !!}
            @include('admin.clients.form')
        {!! Form::close() !!}
    </div><!--end .card -->
@stop

@section('footer')
    {!! Html::script('assets/js/avatar-preview.js') !!}
@stop
