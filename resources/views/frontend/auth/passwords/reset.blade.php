@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Password Reset')

@section('body')
    @include('frontend.partials.banner', ['title' => 'Login'])
    <section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark">
        <div class="uk-container uk-container-center uk-block-default bl-margin-top-ve bl-padding-2-tb">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="uk-panel">
                        <h1 class="uk-article-title">Password Reset</h1>
                        <form class="uk-form" role="form" method="POST" action="{{ url('/password/reset') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="uk-form-row">
                                <label for="email" class="uk-form-label">E-Mail Address</label>
                                <input id="email" type="email" class="uk-width-1-1{{ $errors->has('email') ? ' uk-form-danger' : '' }}" name="email" value="{{ $email or old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="uk-form-row">
                                <div class="uk-grid">
                                    <div class="uk-width-1-2">
                                        <label for="password" class="uk-form-label">Password</label>
                                        <input id="password" type="password" class="uk-width-1-1{{ $errors->has('password') ? ' uk-form-danger' : '' }}" name="password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="uk-width-1-2">
                                        <label for="password-confirm" class="uk-form-label">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="uk-width-1-1{{ $errors->has('password_confirmation') ? ' uk-form-error' : '' }}" name="password_confirmation">

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="uk-form-row uk-text-center">
                                <button type="submit" class="uk-button uk-button-primary">
                                    <i class="material-icons uk-vertical-align-middle">&#xE5D5;</i> Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
