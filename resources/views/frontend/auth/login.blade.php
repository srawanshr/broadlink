@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Customer Login')

@section('body')

    @include('frontend.partials.banner', ['title' => 'Login'])
    <section class="uk-block uk-block-default">
        <div class="uk-container uk-container-center">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    @include('shared.errors')
                </div>
            </div>
            <div class="uk-grid data-uk-grid-match uk-grid-divider">
                <div class="uk-width-1-3">
                    <div class="uk-panel">
                        <h1 class="uk-article-title">Login</h1>
                        {{ Form::open(['url' => 'login', 'class' => 'uk-form' ]) }}
                            <div class="uk-form-row">
                                {{ Form::text('login', old('login'), ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'Email/Username']) }}
                            </div>
                            <div class="uk-form-row">
                                {{ Form::password('password', ['class' => 'uk-width-1-1 uk-form-large', 'placeholder' => 'password']) }}
                            </div>
                            <div class="uk-form-row">
                                <button class="uk-width-1-1 uk-button uk-button-primary uk-button-large" type="submit">Login</button>
                            </div>
                            <div class="uk-form-row uk-text-small">
                                <label class="uk-float-left"><input type="checkbox" name="remember_me"> Remember Me</label>
                                <a class="uk-float-right uk-link uk-link-muted" href="#">Forgot Password?</a>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="uk-width-2-3">
                    {{ Form::open(['url' => '/register', 'class' => 'uk-form uk-panel' ]) }}
                        <h1 class="uk-article-title">Sign Up</h1>

                        <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">First Name</label>
                                {{ Form::text('first_name', old('first_name'), [ 'class' => 'uk-width-1-1'.($errors->has('first_name') ? ' uk-form-danger':'')]) }}
                            </div>
                            
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Last Name</label>
                                {{ Form::text('last_name', old('last_name'), [ 'class' => 'uk-width-1-1'.($errors->has('last_name') ? ' uk-form-danger':'')]) }}
                            </div>
                        </div>

                        <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Email</label>
                                {{ Form::email('email', old('email'), [ 'class' => 'uk-width-1-1'.($errors->has('email') ? ' uk-form-danger':'')]) }}
                            </div>
                        
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Email</label>
                                {{ Form::text('username', old('username'), [ 'class' => 'uk-width-1-1'.($errors->has('username') ? ' uk-form-danger':'')]) }}
                            </div>
                        </div>
                        
                        <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Password</label>
                                {{ Form::password('password', [ 'class' => 'uk-width-1-1'.($errors->has('password') ? ' uk-form-danger':'')]) }}
                            </div>

                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Confirm Password</label>
                                {{ Form::password('password_confirmation', [ 'class' => 'uk-width-1-1'.($errors->has('password') ? ' uk-form-danger':'')]) }}
                            </div>
                        </div>

                        <div class="uk-grid">
                            <label><input type="checkbox" name="terms" class="uk-margin-small-right{{ $errors->has('terms') ? ' uk-form-danger':'' }}">I agrees to the terms and conditions</label>
                        </div>
                        
                        <div class="uk-grid">
                            <div class="uk-width-1-3">
                                <button class="uk-width-1-1 uk-button uk-button-primary uk-button-large" type="submit">Sign Up</button>
                            </div>
                        </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection
