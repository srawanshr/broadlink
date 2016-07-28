{{-- <section id="our-services" class="uk-block uk-block-default uk-margin-remove uk-padding-remove bl-text-dark">
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
</section> --}}
<section id="our-services" class="uk-block uk-block-muted uk-text-center-small">
    <h1 class="uk-text-center">Our Services</h1>
    <div class="uk-container uk-container-center">
        <ul class="uk-tab uk-grid" data-uk-tab="{connect:'#service-switcher', animation: 'scale' }" data-uk-scrollspy="{cls:'uk-animation-scale-up uk-invisible', target:' >li>a', delay:300, topoffset:-50}">
            <li class="uk-active uk-width-small-1-2 uk-width-medium-1-4 uk-text-center">
                <a class="uk-button-large bl-button-image uk-invisible" href="#">
                    <span>
                        <img src="{{ asset('assets/frontend/img/internet.png') }}">
                    </span>
                    INTERNET
                </a>
            </li>
            <li class="uk-width-small-1-2 uk-width-medium-1-4 uk-text-center">
                <a class="uk-button-large bl-button-image uk-invisible" href="#">
                    <span>
                        <img src="{{ asset('assets/frontend/img/broadtv.png') }}">
                    </span>
                    BROADTV
                </a>
            </li>
            <li class="uk-width-small-1-2 uk-width-medium-1-4 uk-text-center">
                <a class="uk-button-large bl-button-image uk-invisible" href="#">
                    <span>
                        <img src="{{ asset('assets/frontend/img/broadtel.png') }}">
                    </span>
                    BROADTEL
                </a>
            </li>
            <li class="uk-width-small-1-2 uk-width-medium-1-4 uk-text-center">
                <a class="uk-button-large bl-button-image uk-invisible" href="#">
                    <span>
                        <img src="{{ asset('assets/frontend/img/bundle.png') }}">
                    </span>
                    BUNDLE
                </a>
            </li>
        </ul>
    </div>
    <ul class="uk-switcher height-2 bl-text-light" id="service-switcher">
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
        <li>
            <div class="uk-container uk-container-center">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <h3>Get In The Game with</h3>
                        <h2>NFL Sunday Ticket</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate voluptates, voluptatibus, in corporis dolore unde eveniet earum libero? Eveniet, debitis omnis. Molestias sed ipsa fuga id hic velit, dolores qui illo. Officiis itaque, labore quae minima aut, obcaecati reprehenderit architecto.</p>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <img src="{{ asset('assets/frontend/img/service_img1.png') }}">
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="uk-container uk-container-center">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <h3>Get In The Game with</h3>
                        <h2>NFL Sunday Ticket</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque aliquam sequi hic ex reprehenderit vitae nostrum, illo neque tempora, assumenda, fugit est eum libero aliquid dolorum officia consectetur quae. Error beatae non, doloribus? Facilis neque sequi delectus, nostrum commodi. Ab!</p>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <img src="{{ asset('assets/frontend/img/service_img1.png') }}">
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="uk-container uk-container-center">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <h3>Get In The Game with</h3>
                        <h2>NFL Sunday Ticket</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, accusantium. Magni iure voluptatem consequatur quisquam, quaerat eum doloribus necessitatibus perspiciatis. Facere possimus aperiam temporibus illum, odit repellendus perferendis ullam unde porro reiciendis rerum debitis consequuntur suscipit esse perspiciatis hic sapiente.</p>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <img src="{{ asset('assets/frontend/img/service_img1.png') }}">
                    </div>
                </div>
            </div>
        </li>
    </ul>
</section>