<nav class="uk-navbar bl-navbar-transparent bl-navbar-overlay bl-navbar-contrast"><!--data-uk-sticky="{'media':767,'showup':true,'animation':'uk-animation-slide-top','top':'.uk-sticky-placeholder + *','clsinactive':'bl-navbar-transparent bl-navbar-contrast'}"-->
    <div class="uk-container uk-container-center">
        <div class="bl-navbar-container">
            <a class="uk-navbar-brand">
                <img alt="Brand" src="{{ asset('assets/frontend/img/logo_.png') }}" class="uk-responsive-height">
            </a>
            <div class="uk-navbar-flip" id="bl-navbar">
                <ul class="uk-navbar-nav uk-hidden-small">
                    <li class="uk-active">
                        <a href="{{ url('/') }}">
                            <i class="pe-7s-home pe pe-va"></i>
                        </a>
                    </li>
                    <li class="uk-parent" data-uk-dropdown="{justify:'.bl-navbar-container'}">
                        <a href="##" class="hover-to-click">Services</a>
                        <div class="uk-dropdown">
                            <div class="uk-grid uk-dropdown-grid">
                                <div class="uk-width-medium-4-10">
                                    <h2>PRODUCTS AND SERVICES</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quibusdam deserunt suscipit repellat magni quam earum, debitis neque vitae ipsam quas explicabo ex aliquam totam molestias alias, quod dicta aut!</p>
                                </div>
                                <div class="uk-width-medium-6-10">
                                    <div class="uk-panel">
                                        <div class="uk-grid">
                                            <div class="uk-width-medium-1-2">

                                                <ul class="uk-tab uk-tab-left" data-uk-tab="{connect:'#bl-nav-services'}">
                                                    @foreach(services() as $service)
                                                        <li><a href="#" class="hover-to-click">{{ $service->name }}</a></li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                            <div class="uk-width-medium-1-2">

                                                <ul id="bl-nav-services" class="uk-switcher">
                                                    @foreach(services() as $service)
                                                        <li>{!! str_limit($service->meta_description, 200) !!}</li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="uk-parent" data-uk-dropdown="{justify:'.bl-navbar-container'}">
                        <a href="##" class="hover-to-click">Help Center</a>{{--{{ route('help::index') }}--}}
                        <div class="uk-dropdown">
                            <div class="uk-grid uk-dropdown-grid">
                                <div class="uk-width-medium-3-10 uk-width-small-2-5">
                                    <span class="callout">Online Support 24/7</span>
                                    <img src="{{ asset('assets/frontend/img/help_customer.png') }}">
                                </div>
                                <div class="uk-width-medium-7-10 uk-width-3-5">
                                    <div class="uk-panel">
                                        <div class="uk-grid bl-grid-medium uk-margin-remove">
                                            <div class="uk-width-medium-1-3">
                                                <a href="#" class="bl-icon-button">
                                                    <span><i class="uk-icon-television uk-icon-justify"></i></span>
                                                    <cite>Label</cite>
                                                </a>
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <a href="#" class="bl-icon-button">
                                                    <span><i class="uk-icon-television uk-icon-justify"></i></span>
                                                    <cite>Label</cite>
                                                </a>
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <a href="#" class="bl-icon-button">
                                                    <span><i class="uk-icon-television uk-icon-justify"></i></span>
                                                    <cite>Label</cite>
                                                </a>
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <a href="#" class="bl-icon-button">
                                                    <span><i class="uk-icon-television uk-icon-justify"></i></span>
                                                    <cite>Label</cite>
                                                </a>
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <a href="#" class="bl-icon-button">
                                                    <span><i class="uk-icon-television uk-icon-justify"></i></span>
                                                    <cite>Label</cite>
                                                </a>
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <a href="#" class="bl-icon-button">
                                                    <span><i class="uk-icon-television uk-icon-justify"></i></span>
                                                    <cite>Label</cite>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="{{ route('contact::index') }}">Contact Us</a></li>
                </ul>
                <a href="#" class="uk-navbar-toggle uk-visible-small"></a>
            </div>
        </div>
    </div>
</nav>