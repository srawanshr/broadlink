@include('backend.partials.errors')
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-large-7-10">
        <div class="uk-grid uk-grid-width-1-1" data-uk-grid="{gutter:24}">
            <div>
                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_b uk-margin-bottom">
                            {{ $title }}
                            <div class="uk-float-right">
                                <a href="{{ route('admin::client.index') }}" class="md-btn md-btn-primary">all clients</a>
                            </div>
                        </h3>
                        <div class="uk-form-row">
                            <label>Name</label>
                            {{ Form::text( 'name', old('name'), [ 'id' => 'client_name', 'class' => 'md-input', 'required' ] ) }}
                        </div>
                        <div class="uk-form-row">
                            <label>Website URL</label>
                            {{ Form::text( 'website', old('website'), [ 'id' => 'client_website', 'class' => 'md-input', 'required' ] ) }}
                        </div>
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
                            {{ Form::checkbox('is_published', true, old('is_published'), [ 'id' => 'client_is_published', 'data-switchery' ] ) }}
                            <label for="client_is_published" class="inline-label">Published</label>
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

        <div class="md-card">
            <div class="md-card-toolbar">
                <h3 class="md-card-toolbar-heading-text">
                    Featured Image
                </h3>
            </div>
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin="10">
                    <div class="uk-width-1-1">
                        @if(isset($client) && ! is_null($client->image))
                            <input type="file" name="image" id="image_file" class="dropify" data-default-file="{{ asset($client->image->thumbnail(260,198)) }}" />
                        @else
                            <input type="file" name="image" id="image_file" class="dropify" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>