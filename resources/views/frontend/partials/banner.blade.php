<section class="banner height-4 text-center uk-position-relative bl-text-light uk-cover" style="background-image: url('{{ asset('assets/frontend/img/bg-service.jpg') }}');" data-uk-parallax="{y: '200'}">
	@if(isset($images))
		<ul class="uk-slideshow" data-uk-slideshow="{autoplay:true, animation:'scale', height: '400px'}">
			@foreach($images as $image)
				<li><img src="{{ asset($image->thumbnail(1280,300)) }}"></li>
			@endforeach
		</ul>
	@endif
    <h1 class="uk-position-cover uk-flex uk-flex-middle uk-flex-center">{{ strtoupper($title) }}</h1>
</section>