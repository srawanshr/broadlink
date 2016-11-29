<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-large-7-10">
        <div class="uk-grid uk-grid-width-1-1" data-uk-grid="{gutter:24}">
            <div>
                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_b uk-margin-bottom">
                            <div class="uk-float-right">
                                <a href="{{ route('admin::pin.index') }}" class="md-btn md-btn-primary">all pins</a>
                            </div>
                        </h3>
                        <div class="uk-form-row md-disabled">
                            <label>Voucher</label>
                            {{ Form::text( '', $pin->voucher, [ 'id' => 'pin_voucher', 'class' => 'md-input disabled', 'required', 'disabled' ] ) }}
                        </div>
                        <div class="uk-form-row md-disabled">
                            <label>Pin</label>
                            {{ Form::text( '', $pin->pin, [ 'id' => 'pin_pin', 'class' => 'md-input disabled', 'required', 'disabled' ] ) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-width-large-3-10">
        <div class="md-card">
            <div class="md-card-content">
                {{ Form::model($pin, [ 'route' => ['admin::pin.update', $pin->id], 'class' => 'uk-form-stacked', 'id' => 'pin_create_form', 'method' => 'put']) }}
                    <h3 class="heading_c uk-margin-medium-bottom">Actions</h3>
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                {{ Form::checkbox('is_used', true, old('is_used'), [ 'id' => 'pin_is_used', 'data-switchery' ] ) }}
                                <label for="pin_is_used" class="inline-label">Used</label>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row uk-float-right">
                                <button type="submit" class="md-btn md-btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>