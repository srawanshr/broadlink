@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Services')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
    @include('frontend.partials.banner', ['title' => 'Voucher'])
    <section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark services">
        <div class="uk-container uk-container-center uk-block-default bl-margin-top-ve bl-padding">
            <div class="uk-grid">
                <div class="uk-width-medium-1-4">
                    <img src="{{ image('assets/frontend/img/'.str_slug($voucher).'.png') }}" class="uk-align-center">
                </div>
                <div class="uk-width-medium-2-4">
                    <h3 class="uk-margin-top uk-text-center-small">Broadlink Recharge Voucher</h3>
                    <h2 class="uk-margin-top uk-text-center-small">{{ $voucher }}</h2>
                    <hr>
                    <div class="uk-panel uk-panel-box">
                        <p>
                            For the convenience of our customers, you can now purchase Broadlink Internet Vouchers
                            instantly with a click of a mouse on your computers. The hassles of coming to respective
                            offices and/or outlets to purchase the vouchers are gone!. Simply follow the process below
                            to purchase online and get vouchers within seconds in your email address that you have
                            provided during online registration.
                        </p>
                        <p>
                            Activation Process (For first time users):
                        </p>

                        <p>
                            Check your provided email address where you received your serial no & voucher no.
                            Please call 9801453020 (Broadlink Customer Care) to activate the account.
                            Provide your name, mobile no., email, address etc. as customer information.
                            An SMS/email will be sent to you immediatly with your Username & Password.
                            Go to http:// hotspot.broadlink.com.np/ and start using Internet. more details.
                        </p>

                        <p>
                            Recharge Process (For existing users):
                        </p>

                        <p>
                            Check your provided email Id (during online a/c creation) where you received serial no &
                            Voucher no.
                            Go to Broadlink customer self care portal
                            Login and recharge your account using received Voucher no through email.
                            Your account will be recharged.
                        </p>
                    </div>
                </div>
                <div class="uk-width-medium-1-4">
                    {{ Form::open(['route' => ['voucher::buy', $voucher], 'class' => 'uk-form']) }}
                    <label for="qty">Quantity</label>
                    <input id="qty" name="qty" value="1" type="number" min="1">
                    <button class="uk-button uk-button-success uk-width-1-1 uk-button-large" type="submit">
                        <i class="material-icons">&#xE854;</i> Add to Cart
                    </button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
    @include('frontend.partials.similar', ['title' => 'Similar Products'])
@stop