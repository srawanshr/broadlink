@extends('frontend.layouts.master')

@section('title', 'Profile')

@section('body')
    @include('frontend.partials.banner', ['title' => 'Profile'])
    <section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark">
        <div class="uk-container bl-block-default uk-container-center bl-margin-top-ve uk-width-medium-7-10 uk-padding-remove" id="user-profile">
            <div class="uk-grid uk-grid-collapse">
                @include('frontend.user.partials.menu')
                <div class="uk-width-4-5">
                    <div class="uk-grid">
                        <div class="uk-width-small-1 uk-margin-large-top">
                            <div class="bl-padding-2-lr">
                                <h2>My Profile</h2>
                                <p>{{ trans('information.profile_edit') }}</p>
                            </div>
                        </div>
                        <div class="uk-width-1 uk-margin-top">
                            <div class="bl-padding-2-lr">
                                {{ Form::model($user, ['route' => 'user::update', 'class' => 'uk-form', 'method' => 'put', 'files' => 'true']) }}
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2">
                                            {{ Form::label('first_name', 'First Name') }}
                                            {{ Form::text('first_name', old('first_name'), ['class'=>'uk-width-1-1', 'id'=>'first_name']) }}
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            {{ Form::label('last_name', 'Last Name') }}
                                            {{ Form::text('last_name', old('last_name'), ['class'=>'uk-width-1-1', 'id'=>'last_name']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-medium-1-2">
                                            {{ Form::label('email', 'Email') }}
                                            {{ Form::email('email', old('email'), ['class'=>'uk-width-1-1', 'id'=>'email', 'required']) }}
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            {{ Form::label('phone', 'Phone') }}
                                            {{ Form::text('phone', old('phone'), ['class'=>'uk-width-1-1', 'id'=>'phone']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-form-file">
                                        <button class="uk-button uk-default uk-button-large" type="button">Upload</button>
                                        <input type="file" name="image" class="uk-hidden avatar-input">
                                        <span>{{ $user->image ? 'Change ' : 'Upload ' }}your avatar.</span>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <button class="uk-float-right uk-button uk-button-primary uk-button-large" type="submit">Save</button>
                                        </div>
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('footer')
    <script>
        (function(){
            "use strict";
            var readURL = function(input){
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.avatar').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            };

            $('.avatar').click(function(){
                $('.avatar-input').trigger('click');
            });

            $(".avatar-input").change(function(){
                readURL(this);
            });

        }())
    </script>
@stop