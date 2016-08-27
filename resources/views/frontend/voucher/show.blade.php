@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Services')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
    @include('frontend.partials.banner', ['title' => 'Voucher'])
    <section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark services">
        <div class="uk-container uk-container-center uk-block-default bl-margin-top-ve">
           VOucher of {{ $voucher }}
        </div>
    </section>
    @include('frontend.partials.similar')
@stop