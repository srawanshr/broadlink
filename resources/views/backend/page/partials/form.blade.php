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
                            {{ Form::checkbox('is_published', true, old('is_published'), [ 'id' => 'page_is_published', 'data-switchery' ] ) }}
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
    </div>
</div>