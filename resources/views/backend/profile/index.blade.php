@extends('backend.layout')

@section('title', 'Profile')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            @include('backend.partials.errors')
            {{ Form::model($admin, ['route' => ['admin::user.profile.update', $admin->slug], 'class' => 'uk-form-stacked', 'files' => true, 'method' => 'put']) }}
            {{ Form::hidden('username', old('username')) }}
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{ user_avatar('admin', 78) }}" alt="user avatar"/>
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div class="user_avatar_controls">
                                    <span class="btn-file">
                                        <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                        <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                        <input type="file" name="image" id="user_edit_avatar_control">
                                    </span>
                                    <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
                                </div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b">
                                    <span class="uk-text-truncate" id="user_edit_uname">{{ $admin->display_name }}</span>
                                    <span class="sub-heading" id="user_edit_position">{{ $admin->username }}</span>
                                </h2>
                            </div>
                            <div class="md-fab-wrapper">
                                <button type="submit" class="md-fab md-fab-accent" id="planAdd"  data-uk-tooltip="{cls:'uk-tooltip-small',pos:'left'}" title="Save">
                                    <i class="material-icons md-color-white">&#xE161;</i>
                                </button>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-margin-top">
                                <h3 class="full_width_in_card heading_c">
                                    General info
                                </h3>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <!-- First name Form Input -->
                                        {{ Form::label('first_name', 'First name') }}
                                        {{ Form::text('first_name', old('first_name'), ['class' => 'md-input']) }}
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <!-- Last Name Form Input -->
                                        {{ Form::label('last_name', 'Last Name') }}
                                        {{ Form::text('last_name', old('last_name'), ['class' => 'md-input']) }}
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <!-- First name Form Input -->
                                        {{ Form::label('password', 'Password') }}
                                        {{ Form::password('password', ['class' => 'md-input']) }}
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <!-- Last Name Form Input -->
                                        {{ Form::label('password_confirmation', 'Repeat Password') }}
                                        {{ Form::password('password_confirmation', ['class' => 'md-input']) }}
                                    </div>
                                </div>
                                <h3 class="full_width_in_card heading_c">
                                    Contact info
                                </h3>
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-2" data-uk-grid-margin>
                                            <div>
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon">
                                                        <i class="md-list-addon-icon material-icons">&#xE158;</i>
                                                    </span>
                                                    <!-- Email Form Input -->
                                                    {{ Form::label('email', 'Email*') }}
                                                    {{ Form::email('email', old('email'), ['class' => 'md-input', 'required']) }}
                                                </div>
                                            </div>
                                            <div>
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon">
                                                        <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                    </span>
                                                    <!-- Phone Form Input -->
                                                    {{ Form::label('phone', 'Phone') }}
                                                    {{ Form::text('phone', old('phone'), ['class' => 'md-input']) }}
                                                </div>
                                            </div>
                                            <div>
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon">
                                                        <i class="md-list-addon-icon material-icons">&#xE55F;</i>
                                                    </span>
                                                    <!-- Address Form Input -->
                                                    {{ Form::label('address', 'Address') }}
                                                    {{ Form::text('address', old('address'), ['class' => 'md-input']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('assets/backend/js/custom/uikit_fileinput.min.js') }}"></script>
@endpush