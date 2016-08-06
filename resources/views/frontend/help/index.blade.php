@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Contact Us')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
    @include('frontend.partials.banner', ['title' => 'Help Center'])
    <section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark">
        <div class="uk-container uk-block-default uk-container-center bl-margin-top-ve bl-padding-2-tb bl-card">
            <div class="uk-grid">
                <div class="uk-width-1-1 uk-text-center">
                    <h2>Common questions about Tixy</h2>
                    <p class="uk-article-lead">
                        Holla
                        <a href="#">@mrareweb</a> if you've got more questions and we'll do our best to answer.
                    </p>
                </div>
            </div>
            <!--end of row-->
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="uk-accordion" data-uk-accordion>
                        <h2 class="uk-accordion-title">Is Tixy fully responsive?</h2>
                        <div class="uk-accordion-content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                        <h2 class="uk-accordion-title">Where can I purchase this template?</h2>
                        <div class="uk-accordion-content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                        <h2 class="uk-accordion-title">Do I need to be a pro to use this?</h2>
                        <div class="uk-accordion-content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                        <h2 class="uk-accordion-title">Is it ok if I buy 400 copies?</h2>
                        <div class="uk-accordion-content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                    <!--end of accordion-->
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@stop