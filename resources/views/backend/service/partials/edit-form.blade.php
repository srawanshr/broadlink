{{ Form::model($service, [ 'route' => [ 'admin::service.update', $service->slug ], 'id' => 'service_edit_form', 'method' => 'put', 'files' => true ]) }}
<input type="hidden" name="order" value="" />
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-large-7-10">
        <div class="uk-grid uk-grid-width-1-1" data-uk-grid="{gutter:24}">
            <div>
                <div class="md-card">
                    <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                        <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                <img src="{{ service_icon($service) }}" alt="user avatar"/>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div class="service_avatar_controls">
                                    <span class="btn-file">
                                        <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                        <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                        <input type="file" name="icon" id="service_edit_avatar_control">
                                    </span>
                                <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
                            </div>
                        </div>
                        <div class="user_heading_content">
                            <div class="uk-grid">
                                <div class="uk-width-1-2 uk-padding-remove">
                                    <h2 class="heading_b">
                                        <span class="uk-text-truncate">{{ $title }}</span>
                                        <span class="sub-heading">{{ $service->name }}</span>
                                    </h2>
                                </div>
                                <div class="uk-width-1-2">
                                    <span class="uk-float-right">
                                        <a href="{{ route('admin::service.index') }}" class="md-btn md-btn-default">all services</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md-card-content">
                        <div class="uk-form-row">
                            <label>Title</label>
                            {{ Form::text( 'name', old('name'), [ 'id' => 'service_name', 'class' => 'md-input', 'required' ] ) }}
                        </div>
                        <div class="uk-form-row">
                            <label>Meta Description</label>
                            {{ Form::textarea( 'meta_description', old('meta_description'), [ 'id' => 'service_meta_description', 'class' => 'md-input', 'cols' => '30', 'rows' => '4' ] ) }}
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <div class="md-card-toolbar-actions">
                            <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
                            <i class="md-icon material-icons md-card-toggle">&#xE316;</i>
                        </div>
                        <h3 class="md-card-toolbar-heading-text">
                            Content
                        </h3>
                    </div>
                    <div class="md-card-content">
                        {{ Form::textarea( 'description_raw', old('description_raw'), [ 'id' => 'wysiwyg_tinymce', 'class' => 'md-input', 'cols' => '30', 'rows' => '20' ] ) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-width-large-3-10">
        <div class="md-card">
            <div class="md-card-content">
                <h3 class="heading_c uk-margin-medium-bottom">Actions</h3>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <div class="uk-form-row">
                            {{ Form::checkbox('is_active', true, old('is_active'), [ 'id' => 'service_is_active', 'data-switchery' ] ) }}
                            <label for="service_is_active" class="inline-label">Active</label>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-form-row uk-float-right">
                            <button type="submit" class="md-btn md-btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
        <div class="md-card">
            <div class="md-card-toolbar">
                <h3 class="md-card-toolbar-heading-text">
                    Banner: {{ ucwords($service->name) }}
                </h3>
            </div>
            <div class="md-card-content">
                <div class="uk-grid-width-1-1">
                    {{ Form::open([ 'route' => 'admin::banner.store', 'files' => true ]) }}
                    <div class="uk-grid" data-uk-grid-margin="10">
                        <div class="uk-width-1-1">
                            <input type="file" name="banner" id="banner_file" class="dropify" data-allowed-file-extensions="jpg jpeg png" />
                            <input type="hidden" name="service" value="{{ $service->id }}" />
                        </div>
                        <div class="uk-width-1-1">
                            <button type="submit" class="md-btn md-btn-primary">Upload</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        @if(isset($banners) && !$service->banners->isEmpty())
            <h4 class="heading_b uk-margin-bottom uk-margin-top">Banners</h4>
            <div class="gallery_grid uk-grid-width-1-1" data-uk-grid="{gutter:16}">
                @foreach($service->banners as $banner)
                    <div>
                        <div class="md-card md-card-hover">
                            <div class="gallery_grid_item md-card-content">
                                <a href="{{ asset($banner->path) }}" data-uk-lightbox="{group:'banner'}">
                                    <img src="{{ asset($banner->thumbnail(294,200)) }}" alt="{{ $banner->name }}">
                                </a>
                                <div class="gallery_grid_image_caption">
                                    <div class="gallery_grid_image_menu" >
                                        <a href="#" class="item_delete" data-source="{{ route('admin::banner.destroy', $banner->id ) }}">
                                            <i class="material-icons uk-margin-small-right">&#xE872;</i>
                                        </a>
                                    </div>
                                    <span class="gallery_image_title uk-text-truncate">{{ $banner->name }}</span>
                                    <span class="uk-text-muted uk-text-small">{{ $banner->created_at->format('M d, Y') }}, {{ human_filesize($banner->size) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>