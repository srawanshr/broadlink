<nav class="uk-navbar bl-navbar-transparent bl-navbar-overlay bl-navbar-contrast">
    <!--data-uk-sticky="{'media':767,'showup':true,'animation':'uk-animation-slide-top','top':'.uk-sticky-placeholder + *','clsinactive':'bl-navbar-transparent bl-navbar-contrast'}"-->
    <div class="uk-container uk-container-center">
        <div class="bl-navbar-container">
            <a class="uk-navbar-brand" href="{{ url('/') }}">
                <img alt="Brand" src="{{ asset('assets/frontend/img/logo_.png') }}">
            </a>
            <div class="uk-navbar-flip" id="bl-navbar">
                <ul class="uk-navbar-nav uk-hidden-small uk-hidden-medium">
                    <li>
                        <a href="{{ url('/') }}">
                            <i class="material-icons">&#xE88A;</i>
                        </a>
                    </li>
                    <li class="uk-parent" data-uk-dropdown="{justify:'.bl-navbar-container'}">
                        <a href="{{ route('service::index') }}">Services</a>
                        <div class="uk-dropdown bl-card">
                            <div class="uk-grid uk-dropdown-grid">
                                <div class="uk-width-medium-4-10">
                                    <h2>PRODUCTS AND SERVICES</h2>
                                    <p>
                                        Broadlink offers various range of products and services under one roof. Bundle with our internet, TV and voice services and get more for less!
                                    </p>
                                </div>
                                <div class="uk-width-medium-6-10">
                                    <div class="uk-panel">
                                        <div class="uk-grid bl-tab-left-container">
                                            <div class="uk-width-medium-1-2">

                                                <ul class="uk-tab uk-tab-left uk-tab-hover"
                                                    data-uk-tab="{connect:'#bl-nav-services'}">
                                                    @foreach(servicesWithGroups()->groupBy('group_id') as $name => $group)
                                                        <li>
                                                            <a href="#">
                                                                <img src="{{ asset($group->first()->group->first()->image->thumbnail(32,32)) }}"> {{ $group->first()->group->first()->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                    @foreach(servicesWithGroups(false) as $service)
                                                        <li>
                                                            <a href="#">
                                                                <img src="{{ asset($service->icon->resize(null,32)) }}"> {{ $service->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                            <div class="uk-width-medium-1-2 uk-tab-left-content bl-padding-2-tb">

                                                <ul id="bl-nav-services" class="uk-switcher">
                                                    @foreach(servicesWithGroups()->groupBy('group_id') as $name => $group)
                                                        <li>
                                                            @foreach($group as $service)
                                                                <p class="bl-padding-tb">{{ $service->name  }}</p>
                                                                <p>
                                                                    {!! str_limit($service->meta_description, 100) !!}
                                                                    <br>
                                                                    <a href="{{ route('service::show', $service->slug)}}">Read
                                                                        More</a>
                                                                </p>
                                                            @endforeach
                                                        </li>
                                                    @endforeach
                                                    @foreach(servicesWithGroups(false) as $service)
                                                        <li>
                                                            <p class="bl-padding-tb">{!! str_limit($service->meta_description, 500) !!}
                                                                <br>
                                                                <a href="{{ route('service::show', $service->slug)}}">Read
                                                                    More</a>
                                                            </p>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{-- <li>
                        <a href="{{ route('voucher::index') }}">
                            Vouchers
                        </a>
                    </li> --}}
                    @foreach(menus() as $menu)
                        @if($menu->type == 0)
                            <li>
                                <a href="{{ asset($menu->url) }}">
                                    {{ $menu->name }}
                                </a>
                            </li>
                        @elseif($menu->type == 1)
                            <li class="uk-parent" data-uk-dropdown>
                                <a href="{{ asset($menu->url) }}">
                                    {{ $menu->name }}
                                </a>
                                <div class="uk-dropdown uk-dropdown-navbar">
                                    <ul class="uk-nav uk-nav-navbar">
                                        @foreach($menu->subMenus()->orderBy('order')->get() as $submenu)
                                            <li>
                                                <a href="{{ asset($submenu->url) }}">
                                                    <i class="material-icons uk-vertical-align-middle">&#x{{ $submenu->icon }};</i>
                                                    {{ $submenu->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @elseif($menu->type == 2)
                            <li class="uk-parent" data-uk-dropdown="{justify:'.bl-navbar-container'}">
                                <a href="{{ asset($menu->url) }}">
                                    {{ $menu->name }}
                                </a>
                                <div class="uk-dropdown bl-card">
                                    <div class="uk-grid uk-dropdown-grid">
                                        @if($image = $menu->image)
                                            <div class="uk-width-medium-3-10 uk-width-small-2-5">
                                                <img src="{{ asset($image->path) }}">
                                            </div>
                                        @endif
                                        <div class="{{ $image ? 'uk-width-medium-7-10 uk-width-3-5' : 'uk-width-1-1' }}">
                                            <div class="uk-panel">
                                                <div class="uk-grid bl-grid-medium uk-margin-remove">
                                                    @forelse($menu->subMenus()->orderBy('order')->get() as $submenu)
                                                        <div class="uk-width-medium-1-3">
                                                            <a href="{{ asset($submenu->url) }}" class="bl-icon-button">
                                                                <span><i class="material-icons uk-vertical-align-middle">&#x{{ $submenu->icon }};</i></span>
                                                                <cite>{{ $submenu->name }}</cite>
                                                            </a>
                                                        </div>
                                                    @empty
                                                        No Submeny
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                    @if( auth()->check() )
                        <li class="uk-parent" data-uk-dropdown>
                            <a href="{{ route('user::dashboard') }}"><i class="material-icons uk-vertical-align-middle">
                                    &#xE853;</i> My Profile</a>
                            <div class="uk-dropdown uk-dropdown-navbar">
                                <ul class="uk-nav uk-nav-navbar">
                                    <li>
                                        <a href="{{ route('user::edit') }}">
                                            <i class="material-icons uk-vertical-align-middle">&#xE853;</i>
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('\logout') }}">
                                            <i class="material-icons uk-vertical-align-middle">&#xE879;</i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="uk-parent" data-uk-dropdown="{justify:'.bl-navbar-container'}">
                            <a href="{{ url('register') }}">Log In</a>
                            <div class="uk-dropdown bl-card">
                                <div class="uk-grid uk-dropdown-grid">
                                    <div class="uk-width-2-5">
                                        <form class="uk-panel uk-panel-box uk-form"
                                              action="{{ url('/login') }}"
                                              method="POST">
                                            {{ csrf_field() }}
                                            <div class="uk-form-row">
                                                <input class="uk-width-1-1 uk-form-large"
                                                       type="text"
                                                       name="login"
                                                       placeholder="Email\Username">
                                            </div>
                                            <div class="uk-form-row">
                                                <input class="uk-width-1-1 uk-form-large"
                                                       type="password"
                                                       name="password"
                                                       placeholder="Password">
                                            </div>
                                            <div class="uk-form-row">
                                                <button class="uk-width-1-1 uk-button uk-button-primary uk-button-large"
                                                        type="submit">Submit
                                                </button>
                                            </div>
                                            <div class="uk-form-row uk-text-small">
                                                <label class="uk-float-left"><input type="checkbox" name="remember_me">
                                                    Remember Me</label>
                                                <a class="uk-float-right uk-link uk-link-muted" href="#">Forgot
                                                    Password?</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="uk-width-3-5 uk-vertical-align">
                                        <div class="uk-vertical-align-middle">
                                            <h2>Not a member ?</h2>
                                            <p>
                                                Login to your Broadlink account via various payment gateways available with us to buy vouchers and pins online.
                                                If you do not have an account with us for online purchasing, please register with us now.
                                            </p>
                                            <a href="{{ url('register') }}">Sign Up Here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                    <li class="uk-parent" data-uk-dropdown="{justify:'.bl-navbar-container'}">
                        <a href="{{ route('cart::index') }}" class="bl-super-badge">
                            @if(Cart::count() > 0)
                                <div class="uk-badge uk-badge-success">{{ Cart::count() }}</div>@endif
                            <i class="material-icons uk-vertical-align-middle">&#xE8CC;</i>
                        </a>
                    </li>
                </ul>
                <a href="#bl-responsive-menu" class="uk-navbar-toggle uk-hidden-large" data-uk-offcanvas></a>
            </div>
        </div>
    </div>
</nav>

<div id="bl-responsive-menu" class="uk-offcanvas">

    <div class="uk-offcanvas-bar uk-offcanvas-bar-flip">
        <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>
            <li>
                <a href="{{ url('/') }}">
                    <i class="material-icons">&#xE88A;</i> Home
                </a>
            </li>
            <li class="uk-parent">
                <a href="#"><i class="material-icons">&#xE5C3;</i> Services</a>
                <ul class="uk-nav-sub">
                    <li><a href="{{ route('service::index') }}">All</a></li>
                    @foreach(services() as $service)
                        <li>
                            <a href="{{ route('service::show', $service->slug) }}">{{ $service->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            {{-- <li>
                <a href="{{ route('voucher::index')  }}">
                    <i class="material-icons">&#xE89A;</i> Shop
                </a>
            </li> --}}
            @foreach(menus() as $menu)
                <li class="{{ $menu->subMenus->count() > 0 ? 'uk-parent' : ''}}">
                    <a href="#">
                        <i class="material-icons uk-vertical-align-middle">&#x{{ $menu->icon }};</i>
                        {{ $menu->name }}
                    </a>
                    <ul class="uk-nav-sub">
                        @foreach($menu->subMenus()->orderBy('order')->get() as $subMenu)
                            <li>
                                <a href="{{ asset($subMenu->url) }}">
                                    <i class="material-icons uk-vertical-align-middle">&#x{{ $subMenu->icon }};</i>
                                    {{ $subMenu->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
            @if( auth()->check() )
                <li class="uk-parent">
                    <a href="#"><i class="material-icons">&#xE853;</i> My Account</a>
                    <ul class="uk-nav-sub">
                        <li>
                            <a href="{{ route('user::edit') }}">
                                <i class="material-icons uk-vertical-align-middle">&#xE853;</i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('\logout') }}">
                                <i class="material-icons uk-vertical-align-middle">&#xE879;</i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            @else
                <li class="uk-parent" data-uk-dropdown="{justify:'.bl-navbar-container'}">
                    <a href="{{ url('register') }}">Log In</a>
                </li>
            @endif
            <li class="uk-parent" data-uk-dropdown="{justify:'.bl-navbar-container'}">
                <a href="{{ route('cart::index') }}" class="bl-super-badge">
                    @if(Cart::count() > 0)
                        <div class="uk-badge uk-badge-success">{{ Cart::count() }}</div>@endif
                    <i class="material-icons uk-vertical-align-middle">&#xE8CC;</i> My Cart
                </a>
            </li>
        </ul>

    </div>

</div>
