@extends('backend.layout')

@section('title', 'Banner')

@push('styles')
    <link href="{{ asset('assets/backend/skins/dropify/css/dropify.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div id="page_content">
        <div id="page_content_inner">

            <h3 class="heading_b uk-margin-bottom">All Banners</h3>
            
            @foreach($pages as $page)
                @unless($page->banners->isEmpty())
                <h4 class="heading_b uk-margin-bottom uk-margin-top">{{ $page->title.' '.'banners' }}</h4>
                <div class="gallery_grid uk-grid-width-medium-1-4 uk-grid-width-large-1-5" data-uk-grid="{gutter:16}">
                    @foreach($page->banners as $banner)
                        <div>
                            <div class="md-card md-card-hover">
                                <div class="gallery_grid_item md-card-content">
                                    <a href="{{ asset($banner->path) }}" data-uk-lightbox="{group:'banner'}">
                                        <img src="{{ asset($banner->thumbnail(200,200)) }}" alt="{{ $banner->name }}">
                                    </a>
                                    <div class="gallery_grid_image_caption">
                                        <div class="gallery_grid_image_menu" >
                                            <a href="#" class="gallry_grid_image_remove" data-id="{{ $banner->id }}"><i class="material-icons uk-margin-small-right">&#xE872;</i></a>
                                        </div>
                                        <span class="gallery_image_title uk-text-truncate">{{ $banner->name }}</span>
                                        <span class="uk-text-muted uk-text-small">{{ $banner->created_at->format('M d, Y') }}, {{ human_filesize($banner->size) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endunless
            @endforeach

            <div class="uk-grid-width-medium-1-2 uk-margin-top" data-uk-grid="{gutter:24}">
                @foreach($pages as $page)
                <div>
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">
                                {{ ucwords($page->title) }}
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <div class="uk-grid-width-1-1">
                                {{ Form::open([ 'route' => 'admin::banner.store', 'files' => true ]) }}
                                    <div class="uk-grid" data-uk-grid-margin="10">
                                        <div class="uk-width-1-1">
                                            <input type="file" name="banner" id="banner_file" class="dropify" data-allowed-file-extensions="jpg jpeg png" />
                                            <input type="hidden" name="page" value="{{ $page->id }}" />
                                        </div>
                                        <div class="uk-width-1-1">
                                            <button type="submit" class="md-btn md-btn-primary">Upload</button>
                                        </div>
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/pages/forms_file_input.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.gallry_grid_image_remove', function() {
                var p = $(this);

                UIkit.modal.confirm('Are you sure?', function() {
                    $.ajax({
                        type: 'post',
                        url: '{{ route('admin::banner.destroy') }}',
                        data: { id: p.data('id') },
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