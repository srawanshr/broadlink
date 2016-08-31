<section id="our-services" class="uk-block uk-block-muted uk-text-center-small uk-text-center">
    <h1 class="uk-text-center">Our Services</h1>
    <div class="uk-container uk-container-center">
        <ul class="uk-tab uk-grid" data-uk-tab="{connect:'#service-switcher', animation: 'scale' }">
            @foreach(servicesWithGroups()->groupBy('group_id') as $name => $group)
                <li class="uk-width-1-4 uk-text-center">
                    <a class="uk-button-large bl-button-image" href="#">
                        <span>
                            <img src="{{ asset($group->first()->group->first()->image->resize(110,null)) }}">
                        </span>
                        <div class="uk-hidden-small">{{ strtoupper( $group->first()->group->first()->name ) }}</div>
                    </a>
                </li>
            @endforeach
            @foreach(servicesWithGroups(false) as $service)
                <li class="uk-width-1-4 uk-text-center">
                    <a class="uk-button-large bl-button-image" href="#">
                    <span>
                        <img src="{{ asset($service->icon->resize(110,null)) }}">
                    </span>
                        <div class="uk-hidden-small">{{ strtoupper( $service->name ) }}</div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <ul class="uk-switcher height-2 bl-text-light uk-text-center" id="service-switcher">
        @foreach(servicesWithGroups()->groupBy('group_id') as $name => $group)
            <li>
                <div class="uk-container uk-container-center">
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-2">
                            @foreach($group as $service)
                                <div class="bl-padding">
                                    <h2>{{ $service->slogan }}</h2>
                                    <a href="{{ route('service::show', $service->slug) }}" class="uk-button bl-btn-outline">View</a>
                                </div>
                            @endforeach
                        </div>
                        <div class="uk-width-medium-1-2">
                            <ul class="uk-slideshow" data-uk-slideshow="{autoplay:true, animation:'swipe'}">
                                @forelse($group->pluck('banners')->flatten() as $banner)
                                    <li><img src="{{ asset($banner->thumbnail(600,300)) }}"></li>
                                @empty
                                    <li><img src="{{ asset('assets/frontend/img/service_img1.png') }}"></li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
        @foreach(servicesWithGroups(false) as $service)
                <li>
                    <div class="uk-container uk-container-center">
                        <div class="uk-grid">
                            <div class="uk-width-medium-1-2">
                                <div class="bl-padding">
                                    <h2>{{ $service->slogan }}</h2>
                                    <p>{!! str_limit($service->description_html,500) !!}</p>
                                    <a href="{{ route('service::show', $service->slug) }}" class="uk-button bl-btn-outline">View</a>
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
        @endforeach
    </ul>
</section>