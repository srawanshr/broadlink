<section id="our-services" class="uk-block uk-block-muted uk-text-center-small">
    <h1 class="uk-text-center">Our Services</h1>
    <div class="uk-container uk-container-center">
        <ul class="uk-tab uk-grid" data-uk-tab="{connect:'#service-switcher', animation: 'scale' }">
            @forelse( services()->take(4) as $service )
                <li class="uk-width-small-1-4 uk-width-medium-1-4 uk-text-center">
                    <a class="uk-button-large bl-button-image" href="#">
                        <span>
                            <img src="{{ $service->icon ? asset($service->icon->resize(110,null)) : '' }}">
                        </span>
                        <div class="uk-hidden-small">{{ strtoupper($service->name) }}</div>
                    </a>
                </li>
            @empty
                <li class="uk-active uk-width-small-1-2 uk-width-medium-1-4 uk-text-center">
                    <a class="uk-button-large bl-button-image uk-invisible" href="#">
                        <span>
                            <img src="{{ asset('assets/frontend/img/internet.png') }}">
                        </span>
                        INTERNET
                    </a>
                </li>
            @endforelse
        </ul>
    </div>
    <ul class="uk-switcher height-2 bl-text-light" id="service-switcher">
        @forelse (services()->take(4) as $service)
            <li>
                <div class="uk-container uk-container-center">
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-2">
                            <div class="bl-padding">
                                <h2>{{ $service->slogan }}</h2>
                                <p>{!! $service->description_html !!}</p>
                                <a href="{{ route('service::show', $service->slug) }}" class="uk-button bl-btn-outline">Buy</a>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <ul class="uk-slideshow" data-uk-slideshow="{autoplay:true, animation:'swipe'}">
                                @forelse($service->banners as $banner)
                                    <li><img src="{{ asset($banner->thumbnail(600,300)) }}"></li>
                                @empty
                                    <li><img src="{{ asset('assets/frontend/img/service_img1.png') }}"></li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        @empty
            <li>
                <div class="uk-container uk-container-center">
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-2">
                            <h3>Get In The Game with</h3>
                            <h2>NFL Sunday Ticket</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dolorem quasi corporis ipsa, impedit sapiente, blanditiis repudiandae voluptatibus odio suscipit magnam reiciendis necessitatibus maxime voluptates ipsam! Praesentium aliquam vitae aperiam quaerat nobis quas repudiandae necessitatibus accusamus. Libero necessitatibus nemo quibusdam excepturi, dolores, incidunt iste autem facilis natus deserunt corporis, eaque.</p>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <img src="{{ asset('assets/frontend/img/service_img1.png') }}">
                        </div>
                    </div>
                </div>
            </li>
        @endforelse
    </ul>
</section>