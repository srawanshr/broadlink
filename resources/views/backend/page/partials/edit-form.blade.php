{{ Form::model($page, [ 'route' => [ 'admin::page.update', $page->slug ], 'id' => 'page_edit_form', 'method' => 'put' ]) }}
<input type="hidden" name="view" value="frontend/page/index" />
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-large-7-10">
        <div class="uk-grid uk-grid-width-1-1" data-uk-grid="{gutter:24}">
            <div>
                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_b uk-margin-bottom">
                            {{ $title }}
                            <div class="uk-float-right">
                                <a href="{{ route('admin::page.index') }}" class="md-btn md-btn-primary">all pages</a>
                            </div>
                        </h3>
                        <div class="uk-form-row">
                            <label>Title</label>
                            {{ Form::text( 'title', old('title'), [ 'id' => 'page_title', 'class' => 'md-input', 'required' ] ) }}
                        </div>
                        <div class="uk-form-row">
                            <label>Meta Description</label>
                            {{ Form::textarea( 'meta_description', old('meta_description'), [ 'id' => 'page_meta_description', 'class' => 'md-input', 'cols' => '30', 'rows' => '4' ] ) }}
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
                        {{ Form::textarea( 'content_raw', old('content_raw'), [ 'id' => 'wysiwyg_tinymce', 'class' => 'md-input', 'cols' => '30', 'rows' => '20' ] ) }}
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
                            {{ Form::checkbox('is_published', 1, isset($page) ? !$page->is_draft: old('is_published'), [ 'id' => 'page_is_published', 'data-switchery' ] ) }}
                            <label for="page_is_published" class="inline-label">Publish</label>
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
                    Banner Upload
                </h3>
            </div>
            <div class="md-card-content">
                {{ Form::open([ 'route' => 'admin::banner.store', 'files' => true ]) }}
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <input type="file" name="banner" id="banner_file" class="dropify" data-allowed-file-extensions="jpg jpeg png" required />
                        <input type="hidden" name="page" value="{{ $page->id }}" />
                    </div>
                    <div class="uk-width-1-1 uk-margin-top">
                        <button type="submit" class="md-btn md-btn-primary">Upload</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
        @if(isset($banners) && !$page->banners->isEmpty())
            <h4 class="heading_b uk-margin-bottom uk-margin-top">Banners</h4>
            <div class="gallery_grid uk-grid-width-1-1" data-uk-grid="{gutter:16}">
                @foreach($page->banners as $banner)
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
