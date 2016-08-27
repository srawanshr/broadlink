@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Post')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
    @include('frontend.partials.banner', ['title' => $post->title])

    <section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark">
        <div class="uk-container uk-container-center bl-margin-top-ve uk-block-default bl-padding-2-tb bl-card">
            <div class="uk-block-default uk-margin-large-bottom">
                @if( !empty($post->image) )
                    <img src="{{ asset($post->image->thumbnail(800,494)) }}"
                         class="uk-responsive-width uk-align-center bl-padding-tb">
                @endif
                <p>{!! $post->content_html !!}</p>
            </div>
        </div>
    </section>
@stop