@include('backend.partials.errors')
<input type="hidden" name="order" value="" />
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-large-7-10">
        <div class="uk-grid uk-grid-width-1-1" data-uk-grid="{gutter:24}">
            <div>
                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_b uk-margin-bottom">
                            {{ $title }}
                            <div class="uk-float-right">
                                <a href="{{ route('admin::product.index') }}" class="md-btn md-btn-primary">all products</a>
                            </div>
                        </h3>
                        <div class="uk-form-row">
                            <div class="uk-grid">
                                <div class="uk-width-medium-1-1">
                                    <label>Name</label>
                                    {{ Form::text( 'name', old('name'), [ 'id' => 'product_name', 'class' => 'md-input', 'required' ] ) }}
                                </div>
                                {{-- <div class="uk-width-medium-1-2">
                                    <label>Price</label>
                                    {{ Form::number( 'price', old('price'), [ 'id' => 'product_price', 'class' => 'md-input', 'step' => 'any', 'required' ] ) }}
                                </div> --}}
                            </div>
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
                            {{ Form::checkbox('is_active', true, old('is_active'), [ 'id' => 'product_is_active', 'data-switchery' ] ) }}
                            <label for="product_is_active" class="inline-label">Active</label>
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
                    Services
                </h3>
            </div>
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-1-1">
                        @if($services->isEmpty())
                            <p>{{ trans('messages.empty', ['entity' => 'Active Services']) }}</p>
                        @else
                            @foreach($services as $id => $name)
                                <p>
                                    {{ Form::radio('service_id', $id, old('service_id'), [ 'id' => 'product_service_id_'.$id, 'data-md-icheck', 'required' ]) }}
                                    <label for="product_service_id_{{ $id }}" class="inline-label">{{ $name }}</label>
                                </p>
                            @endforeach
                        @endif
                        <span class="uk-form-help-block">Select a service</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="md-card">
            <div class="md-card-toolbar">
                <h3 class="md-card-toolbar-heading-text">
                    Plans
                </h3>
            </div>
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-1-1">
                        @if($plans->isEmpty())
                            <p>{{ trans('messages.empty', ['entity' => 'Active Plans']) }}</p>
                        @else
                            @foreach($plans->groupBy('service_id') as $service_id => $data)
                                <div class="plan_list uk-hidden" data-service-id="{{ $service_id }}">
                                    @foreach($data->lists('name', 'id') as $id => $name)
                                    <p>
                                        {{ Form::radio('plan_id', $id, old('plan_id'), [ 'id' => 'product_plan_id_'.$id, 'data-md-icheck', 'required' ]) }}
                                        <label for="product_plan_id_{{ $id }}" class="inline-label">{{ $name }}</label>
                                    </p>
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
                        <span class="uk-form-help-block">Select a plan</span>
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
                        @if(isset($product) && ! is_null($product->image))
                            <input type="file" name="image" id="image_file" class="dropify" data-default-file="{{ asset($product->image->thumbnail(260,198)) }}" />
                        @else
                            <input type="file" name="image" id="image_file" class="dropify" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>