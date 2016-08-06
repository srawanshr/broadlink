@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Services')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
	@include('frontend.partials.banner', ['title' => $page->title, 'images' => $page->banners ])

	<section class="uk-block uk-block-default uk-margin-remove uk-padding-remove bl-text-dark">
		<div class="uk-container uk-container-center">
			<div class="uk-block-default uk-margin-large-bottom">
				<p>{!! $page->content_html !!}</p>
			</div>
		</div>
	</section>	
@stop