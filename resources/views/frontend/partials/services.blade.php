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
                    <div data-uk-slider class="uk-slidenav-position">
                        <div class="uk-slider-container">
                            <ul class="uk-slider uk-grid-width-small-1-1">
                                @foreach($group as $service)
                                    <li>
                                        <div class="uk-grid">
                                            <div class="uk-width-medium-1-2">
                                                <div class="bl-padding">
                                                    <h2>{{ $service->slogan }}</h2>
                                                    <p>{!! str_limit(strip_tags($service->description_html),700) !!}</p>
                                                    <a href="{{ route('service::show', $service->slug) }}" class="uk-button bl-btn-outline">View</a>
                                                </div>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <div data-uk-slideshow="{autoplay:true, animation:'swipe'}" class="height-4">
                                                    <ul class="uk-slideshow height-4">
                                                        @forelse($group->pluck('banners')->flatten() as $banner)
                                                            <li class="height-4"><img src="{{ asset($banner->resize(600, null)) }}" class="height-4"></li>
                                                        @empty
                                                            <li class="height-4"><img src="{{ asset('assets/frontend/img/service_img1.png') }}" class="height-4"></li>
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
                        <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
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
                                    <p>{!! str_limit(strip_tags($service->description_html),700) !!}</p>
                                    <a href="{{ route('service::show', $service->slug) }}" class="uk-button bl-btn-outline">View</a>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <div data-uk-slideshow="{autoplay:true, animation:'swipe'}" class="height-4">
                                    <ul class="uk-slideshow height-4">
                                        @forelse($service->banners as $banner)
                                            <li class="height-4"><img src="{{ asset($banner->resize(110, null)) }}" class="height-4"></li>
                                        @empty
                                            <li class="height-4"><img src="{{ asset('assets/frontend/img/service_img1.png') }}" class="height-4"></li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
        @endforeach
    </ul>
</section>