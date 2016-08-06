@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Services')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
	@include('frontend.partials.banner', ['title' => 'Services', 'images' => $page->banners ])
	<section id="our-services-index" class="uk-block uk-block-default uk-margin-remove uk-padding-remove bl-text-dark">
		<div class="uk-container uk-container-center">
			<div class="uk-block-default uk-margin-large-bottom">
				<p>{!! $page->content_raw !!}</p>
			</div>
			@foreach(services() as $key => $service)
		        <div class="uk-grid uk-grid-collapse uk-margin-remove" id="internet">
		            <div class="uk-width-medium-1-2 uk-cover {{ is_even($key) ? 'uk-push-1-2':'' }}" data-uk-scrollspy="{cls:'uk-animation-slide-{{ $direction = $key %2 == 0 ? 'right': 'left' }}', topoffset: -100, repeat: true}">
		                <ul class="uk-slideshow" data-uk-slideshow="{autoplay:true, animation:'swipe'}">
		                	@foreach($service->banners as $banner)
		                	<li><img src="{{ asset($banner->thumbnail(565, 330)) }}" class="" alt=""></li>
		                	@endforeach
		                </ul>
		            </div>
		            <div class="uk-width-medium-1-2 uk-vertical-align bl-service-description uk-text-medium-left {{ is_even($key) ? 'uk-pull-1-2':'' }}" data-uk-scrollspy="{cls:'uk-animation-slide-{{ $direction = $key %2 == 0 ? 'left': 'right' }}', topoffset: -100, repeat: true}">
		                <div class="uk-vertical-align-middle">                
		                    <h1>{{ $service->name }}</h1>
		                    <p>
		                        {!! str_limit($service->description_html, 150) !!}
		                    </p>
		                    <a href="{{ route('service::show', $service->slug) }}" class="uk-button bl-btn-outline">Buy</a>
		                </div>
		            </div>
		        </div>
	        @endforeach
    	</div>
    </section>
    @include('frontend.partials.notes')
@stop