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
                                <a href="{{ route('admin::testimonial.index') }}" class="md-btn md-btn-primary">all testimonials</a>
                            </div>
                        </h3>
                        <div class="uk-form-row">
                            <label>Customer</label>
                            {!! Form::select('user_id', $users, old('user_id'), ['data-md-selectize', 'data-placeholder' => 'Select a customer', 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1">
                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_c uk-margin-medium-bottom">Quote</h3>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <div class="uk-form-row">
                                    <label>Textarea</label>
                                    {!! Form::textarea('quote', old('quote'), ['class'=>'md-input', 'required', 'maxlength' => 300, 'rows'=>4]) !!}
                                </div>
                            </div>
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
                            {{ Form::checkbox('is_published', true, old('is_published'), [ 'id' => 'testimonial_is_active', 'data-switchery' ] ) }}
                            <label for="testimonial_is_active" class="inline-label">Active</label>
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