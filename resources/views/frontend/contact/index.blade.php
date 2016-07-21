@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Contact Us')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
    @include('frontend.partials.banner', ['title' => 'Contact Us'])
    <section class="uk-block uk-block-default uk-block-large">
        <div class="uk-container uk-container-center">
            <div class="uk-grid">
                <div class="uk-width-medium-1-2">
                    <h2>Get In Touch</h2>
                    <p>
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                    </p>
                    <hr>
                    <p>
                        438 Marine Parade
                        <br> Elwood, Victoria
                        <br> P.O Box 3184
                    </p>
                    <hr>
                    <p>
                        <strong>E:</strong> hello@foundry.net
                        <br>
                        <strong>P:</strong> +614 3948 2726
                        <br>
                    </p>
                </div>
                <div class="uk-width-medium-1-2">
                    <form class="form-email" class="uk-form" >
                        <input type="text" class="uk-form-large uk-width-1-1" name="name" placeholder="Your Name">
                        <input type="text" class="uk-form-large uk-width-1-1 validate-email" name="email" placeholder="Email Address">
                        <textarea class="uk-width-1-1" name="message" rows="8" placeholder="Message"></textarea>
                        <button type="submit" class="uk-button uk-button-success uk-width-1-1">Send Message</button>
                    </form>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@stop