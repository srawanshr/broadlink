@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Contact Us')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
    @include('frontend.partials.banner', ['title' => 'Contact Us', 'images' => $page->banners])
    <section class="uk-block uk-block-default uk-block-large">
        <div class="uk-container uk-container-center">
            <div class="uk-grid">
                <div class="uk-width-medium-1-2">
                    {!! $page->content_html !!}
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