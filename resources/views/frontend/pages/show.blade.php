@extends('frontend.layouts.master')

@section('title', 'Broadlink :: '.$page->title)

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
	@include('frontend.partials.banner', ['title' => $page->title, 'images' => $page->banners ])

	<section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark">
		<div class="uk-container uk-container-center bl-margin-top-ve uk-block-default bl-padding-2-tb bl-card">
			<div class="uk-block-default uk-margin-large-bottom">
				<p>{!! $page->content_html !!}</p>
			</div>
		</div>
	</section>	
@stop