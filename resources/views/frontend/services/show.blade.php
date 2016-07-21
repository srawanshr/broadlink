@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Services')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
    @include('frontend.partials.banner', ['service' => $service])
    <section class="uk-block services uk-block-default">
        <div class="uk-container uk-container-center">
            <ul class="uk-tab bl-tab" data-uk-tab="{connect:'#services'}">
                <li class="uk-active"><a href="javascript:void(0);">Corporate</a></li>
                <li><a href="javascript:void(0);">Comercial</a></li>
                <li><a href="javascript:void(0);">Business</a></li>
            </ul>
            <ul class="uk-switcher bl-switcher" id="services">
                <li>@include('frontend.services.plan')</li>
                <li>b</li>
                <li>c</li>
            </ul>
        </div>
    </section>
    <section class="note uk-block uk-block-muted">
        <div class="uk-container uk-container-center">
            <h2>PLEASE NOTE</h2>
            <div class="uk-grid">
                <div class="uk-width-1-3">
                    <div class="bl-icon-description">
                        <a href="#" class="uk-icon-button uk-icon-sticky-note"></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, quaerat.</p>
                    </div>
                </div>
                <div class="uk-width-1-3">
                    <div class="bl-icon-description">
                        <a href="#" class="uk-icon-button uk-icon-birthday-cake"></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, tempore!</p>
                    </div>
                </div>
                <div class="uk-width-1-3">
                    <div class="bl-icon-description">
                        <a href="#" class="uk-icon-button uk-icon-map-pin"></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, fugit?</p>
                    </div>
                </div>
                <div class="uk-width-1-3">
                    <div class="bl-icon-description">
                        <a href="#" class="uk-icon-button uk-icon-user"></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, perferendis.</p>
                    </div>
                </div>
                <div class="uk-width-1-3">
                    <div class="bl-icon-description">
                        <a href="#" class="uk-icon-button uk-icon-rupee"></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, ut.</p>
                    </div>
                </div>
                <div class="uk-width-1-3">
                    <div class="bl-icon-description">
                        <a href="#" class="uk-icon-button uk-icon-download"></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, et?</p>
                    </div>
                </div>
                <div class="uk-width-1-3">
                    <div class="bl-icon-description">
                        <a href="#" class="uk-icon-button uk-icon-rocket"></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, officia.</p>
                    </div>
                </div>
                <div class="uk-width-1-3">
                    <div class="bl-icon-description">
                        <a href="#" class="uk-icon-button uk-icon-hacker-news"></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, quisquam!</p>
                    </div>
                </div>
                <div class="uk-width-1-3">
                    <div class="bl-icon-description">
                        <a href="#" class="uk-icon-button uk-icon-graduation-cap"></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, sit.</p>
                    </div>
                </div>
                <div class="uk-width-1-3">
                    <div class="bl-icon-description">
                        <a href="#" class="uk-icon-button uk-icon-weixin"></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, quae.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop