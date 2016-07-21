<section id="our-services" class="uk-block uk-block-default uk-margin-remove uk-padding-remove bl-text-dark">
    @foreach(services() as $key => $service)
        <div class="uk-grid uk-grid-collapse uk-margin-remove" id="service-{{ $service->slug }}">
            <div data-uk-scrollspy="{cls:'uk-animation-slide-{{ $direction = $key %2 == 0 ? 'left': 'right' }}', topoffset: -50, repeat: true}" class="uk-width-medium-1-2 uk-cover {{ $direction == 'right' ? 'uk-push-1-2' : '' }}">
                <img src="{{ asset($service->banners->random()->thumbnail(700,450)) }}" class="" alt="">
            </div>
            <div class="{{ $direction == 'right' ? 'uk-pull-1-2' : '' }} uk-width-medium-1-2 uk-vertical-align bl-service-description uk-text-medium-{{ $direction }}" data-uk-scrollspy="{cls:'uk-animation-slide-{{ $direction == 'left' ? 'right' : 'left' }}', topoffset: -100, repeat: true}">
                <div class="uk-vertical-align-middle">                
                    <h1>{{ $service->name }}</h1>
                    <p>
                        {!! $service->description_html !!}
                    </p>
                    <a href="{{ route('service::show', $service->slug) }}" class="uk-button bl-btn-outline">Buy</a>
                </div>
            </div>
        </div>
    @endforeach
</section>