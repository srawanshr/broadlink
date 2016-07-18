@extends('backend.layout')

@section('title', 'User')

@push('styles')
    <link href="{{ asset('assets/backend/skins/dropify/css/dropify.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">Import Pin</h3>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-1-1">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h4 class="heading_a uk-margin-small-bottom">Info</h4>
                            {{ trans('messages.info_excel') }}
                            @include('backend.partials.errors')
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a uk-margin-small-bottom">
                                Import
                            </h3>
                            {{ Form::open([ 'route' => 'admin::pin.store', 'files' => true, 'novalidate' ]) }}
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <input type="file" name="pin" id="pin_file" class="dropify" />
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <button type="submit" class="md-btn md-btn-primary">Import</button>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/pages/forms_file_input.min.js') }}"></script>
@endpush
