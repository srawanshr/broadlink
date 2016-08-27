<nav class="uk-navbar bl-navbar-transparent bl-navbar-overlay bl-navbar-contrast">
    <!--data-uk-sticky="{'media':767,'showup':true,'animation':'uk-animation-slide-top','top':'.uk-sticky-placeholder + *','clsinactive':'bl-navbar-transparent bl-navbar-contrast'}"-->
    <div class="uk-container uk-container-center">
        <div class="bl-navbar-container">
            <a class="uk-navbar-brand">
                <img alt="Brand" src="{{ asset('assets/frontend/img/logo_.png') }}" class="uk-responsive-height">
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
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quibusdam deserunt
                                       suscipit repellat magni quam earum, debitis neque vitae ipsam quas explicabo ex
                                       aliquam totam molestias alias, quod dicta aut!</p>
                                </div>
                                <div class="uk-width-medium-6-10">
                                    <div class="uk-panel">
                                        <div class="uk-grid bl-tab-left-container">
                                            <div class="uk-width-medium-1-2">

                                                <ul class="uk-tab uk-tab-left uk-tab-hover"
                                                    data-uk-tab="{connect:'#bl-nav-services'}">
                                                    @foreach(services() as $service)
                                                        <li>
                                                            <a href="{{ route('service::show', $service->slug) }}">
                                                                <img src="{{ asset($service->icon->thumbnail(32,32)) }}"> {{ $service->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                            <div class="uk-width-medium-1-2 uk-tab-left-content">

                                                <ul id="bl-nav-services" class="uk-switcher">
                                                    @foreach(services() as $service)
                                                        <li>
                                                            <p class="bl-padding-tb">{!! str_limit($service->meta_description, 200) !!}</p>
                                                            <a href="{{ route('service::show', $service->slug)}}">Read
                                                                                                                  More</a>
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
                    @foreach(menus() as $menu)
                        @if($menu->type == 0)
                            <li>
                                <a href="{{ $menu->url }}">
                                    <i class="material-icons uk-vertical-align-middle">&#x{{ $menu->icon }};</i>
                                    {{ $menu->name }}
                                </a>
                            </li>
                        @elseif($menu->type == 1)
                            <li class="uk-parent" data-uk-dropdown>
                                <a href="{{ $menu->url }}">
                                    <i class="material-icons uk-vertical-align-middle">&#x{{ $menu->icon }};</i>
                                    {{ $menu->name }}
                                </a>
                                <div class="uk-dropdown uk-dropdown-navbar">
                                    <ul class="uk-nav uk-nav-navbar">
                                        @foreach($menu->subMenus as $submenu)
                                            <li>
                                                <a href="{{ $submenu->url }}">
                                                    <i class="material-icons uk-vertical-align-middle">{{ $submenu->icon }}</i>
                                                    {{ $submenu->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @elseif($menu->type == 2)
                            <li class="uk-parent" data-uk-dropdown="{justify:'.bl-navbar-container'}">
                                <a href="{{ $menu->url }}">
                                    <i class="material-icons uk-vertical-align-middle">&#x{{ $menu->icon }};</i>
                                    {{ $menu->name }}
                                </a>
                                <div class="uk-dropdown bl-card">
                                    <div class="uk-grid uk-dropdown-grid">
                                        <div class="uk-width-medium-3-10 uk-width-small-2-5">
                                            <img src="{{ asset($menu->image->path) }}">
                                        </div>
                                        <div class="uk-width-medium-7-10 uk-width-3-5">
                                            <div class="uk-panel">
                                                <div class="uk-grid bl-grid-medium uk-margin-remove">
                                                    @forelse($menu->subMenus as $submenu)
                                                        <div class="uk-width-medium-1-3">
                                                            <a href="{{ $submenu->url }}" class="bl-icon-button">
                                                                <span><i class="material-icons uk-vertical-align-middle">{{ $submenu->icon }}</i></span>
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
                        <li><a href="{{ route('user::dashboard') }}"><i class="material-icons uk-vertical-align-middle">&#xE853;</i> My Profile</a></li>
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
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt
                                               voluptate sequi hic dignissimos vel? Sed veniam deleniti dolor, voluptas.
                                               Aliquam.</p>
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
            @foreach(menus() as $menu)
                <li class="{{ $menu->subMenus->count() > 0 ? 'uk-parent' : ''}}">
                    <a href="#">
                        <i class="material-icons uk-vertical-align-middle">&#x{{ $menu->icon }};</i>
                        {{ $menu->name }}
                    </a>
                    <ul class="uk-nav-sub">
                        @foreach($menu->subMenus as $subMenu)
                            <li>
                                <a href="{{ $subMenu->url }}">
                                    <i class="material-icons uk-vertical-align-middle">{{ $subMenu->icon }}</i>
                                    {{ $subMenu->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
            @if( auth()->check() )
                <li><a href="{{ route('user::dashboard') }}"><i class="material-icons">&#xE853;</i> My Account</a></li>
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