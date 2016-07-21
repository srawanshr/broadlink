<nav class="uk-navbar bl-navbar-transparent bl-navbar-overlay bl-navbar-contrast" data-uk-sticky="{'media':767,'showup':true,'animation':'uk-animation-slide-top','top':'.uk-sticky-placeholder + *','clsinactive':'bl-navbar-transparent bl-navbar-contrast'}">
    <div class="uk-container uk-container-center">
        <a class="uk-navbar-brand">
            <img alt="Brand" src="{{ asset('assets/frontend/img/logo_.png') }}" class="uk-responsive-height">
        </a>
        <div class="uk-navbar-flip" id="bl-navbar">
            <ul class="uk-navbar-nav uk-hidden-small">
                <li class="uk-active">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="uk-parent" data-uk-dropdown>
                    <a href="##" class="hover-to-click">Services</a>
                    <div class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                            @foreach(services() as $service)
                                <li><a href="{{ route('service::show', $service->slug) }}">{{ $service->name }}</a></li>
                            @endforeach
                        </ul>
                        {{-- <div class="uk-grid uk-dropdown-grid">
                            <div class="uk-width-medium-1-3">
                                <div class="uk-panel">
                                    1
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="uk-panel">
                                    2   
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <div class="uk-panel">
                                    3
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </li>
                <li><a href="{{ route('help::index') }}">Help Center</a></li>
                <li><a href="{{ route('contact::index') }}">Contact Us</a></li>
            </ul>
            <a href="#" class="uk-navbar-toggle uk-visible-small"></a>
        </div>
    </div>
</nav>

{{--<nav class="navbar navbar-transparent navbar-default navbar-fixed">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">

            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right navbar-floating text-center">
                <li><a href="#"><i class="pe-7s-home pe-va pe-lg"></i></a></li>
                <li><a href="#">Service</a></li>
                <li class="mega-dropdown dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Help Center <span class="caret"></span></a>
                    <ul class="dropdown-menu mega-dropdown-menu row">
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">New in Stores</li>
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <a href="#"><img
                                                        src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection"
                                                        class="img-responsive" alt="product 1"></a>
                                            <h4>
                                                <small>Summer dress floral prints</small>
                                            </h4>
                                            <button class="btn btn-primary" type="button">49,99 €</button>
                                            <button href="#" class="btn btn-default" type="button"><span
                                                        class="glyphicon glyphicon-heart"></span> Add to Wishlist
                                            </button>
                                        </div><!-- End Item -->
                                        <div class="item">
                                            <a href="#"><img
                                                        src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection"
                                                        class="img-responsive" alt="product 2"></a>
                                            <h4>
                                                <small>Gold sandals with shiny touch</small>
                                            </h4>
                                            <button class="btn btn-primary" type="button">9,99 €</button>
                                            <button href="#" class="btn btn-default" type="button"><span
                                                        class="glyphicon glyphicon-heart"></span> Add to Wishlist
                                            </button>
                                        </div><!-- End Item -->
                                        <div class="item">
                                            <a href="#"><img
                                                        src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection"
                                                        class="img-responsive" alt="product 3"></a>
                                            <h4>
                                                <small>Denin jacket stamped</small>
                                            </h4>
                                            <button class="btn btn-primary" type="button">49,99 €</button>
                                            <button href="#" class="btn btn-default" type="button"><span
                                                        class="glyphicon glyphicon-heart"></span> Add to Wishlist
                                            </button>
                                        </div><!-- End Item -->
                                    </div><!-- End Carousel Inner -->
                                </div><!-- /.carousel -->
                                <li class="divider"></li>
                                <li><a href="#">View all Collection <span
                                                class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Dresses</li>
                                <li><a href="#">Unique Features</a></li>
                                <li><a href="#">Image Responsive</a></li>
                                <li><a href="#">Auto Carousel</a></li>
                                <li><a href="#">Newsletter Form</a></li>
                                <li><a href="#">Four columns</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Tops</li>
                                <li><a href="#">Good Typography</a></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Jackets</li>
                                <li><a href="#">Easy to customize</a></li>
                                <li><a href="#">Glyphicons</a></li>
                                <li><a href="#">Pull Right Elements</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Pants</li>
                                <li><a href="#">Coloured Headers</a></li>
                                <li><a href="#">Primary Buttons & Default</a></li>
                                <li><a href="#">Calls to action</a></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Accessories</li>
                                <li><a href="#">Default Navbar</a></li>
                                <li><a href="#">Lovely Fonts</a></li>
                                <li><a href="#">Responsive Dropdown </a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Newsletter</li>
                                <form class="form" role="form">
                                    <div class="form-group">
                                        <label class="sr-only" for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                </form>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#"><i class="pe-7s-cart pe-va pe-lg"></i></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>--}}