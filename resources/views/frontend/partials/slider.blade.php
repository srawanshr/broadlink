<section id="slider">
    <div data-uk-slider="{autoplay: true, pauseOnHover: false}" class="uk-slidenav-position">
        <div class="uk-slider-container">
            <ul class="uk-slider uk-grid-width-small-1-1">
                <li>
                    <div class="bg"
                         style="background: url('{{ asset('assets/frontend/img/background.jpg') }}'); background-size: cover; background-repeat: no-repeat;">
                        <div class="uk-container uk-container-center">
                            <div class="main-slider full-height">
                                <div class="uk-grid">
                                    <div class="uk-width-small-1-1">
                                        <div class="images">
                                            <div class="image image1">
                                                <img src="{{ asset('assets/frontend/img/bg.png') }}">
                                            </div>
                                            <div class="image image2">
                                                <img src="{{ asset('assets/frontend/img/fg.png') }}">
                                            </div>
                                            <div class="image image3">
                                                <img src="{{ asset('assets/frontend/img/signal.png') }}">
                                            </div>
                                            <div class="image image4">
                                                <img src="{{ asset('assets/frontend/img/people.png') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-small-1-1 subtitle-wrap">
                                        <div class="subtitle bl-text-light uk-text-center-small uk-text-right">
                                            <h1 class="bl-text-primary stroke-white">Wherever you are</h1>
                                            <h2>We are with you</h2>
                                            <div class="button-group">
                                                <a class="uk-button bl-button" href="{{ route('service::show','broad-wifi') }}">
                                                    <i class="material-icons uk-vertical-align-middle">&#xE89A;</i>
                                                    Subscribe
                                                </a>
                                                <a class="uk-button uk-button-primary" href="{{ route('service::index') }}">
                                                    View Services
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bg"
                         style="background: url('{{ asset('assets/frontend/img/background.jpg') }}'); background-size: cover; background-repeat: no-repeat;">
                        <div class="uk-container uk-container-center">
                            <div class="main-slider full-height">
                                <div class="uk-grid">
                                    <div class="uk-width-small-1-1">
                                        <div class="images">
                                            <div class="image image1">
                                                <img src="{{ asset('assets/frontend/img/laptop2.png') }}">
                                            </div>
                                            <div class="image image2">
                                                <img src="{{ asset('assets/frontend/img/tablet.png') }}">
                                            </div>
                                            <div class="image image3">
                                                <img src="{{ asset('assets/frontend/img/phone.png') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-small-1-1 subtitle-wrap">
                                        <div class="subtitle bl-text-light uk-text-center-small uk-text-right">
                                            <h1 class="bl-text-primary stroke-white">The best there is</h1>
                                            <h2>At affordable cost</h2>
                                            <div class="button-group">
                                                <a class="uk-button bl-button" href="{{ route('service::show','broad-wifi') }}">
                                                    <i class="material-icons uk-vertical-align-middle">&#xE89A;</i>
                                                    Subscribe
                                                </a>
                                                <a class="uk-button uk-button-primary" href="{{ route('service::index') }}">
                                                    View Services
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                <li data-uk-slider-item="0"><a href="#">Item1</a></li>
                <li data-uk-slider-item="1"><a href="#">Item2</a></li>
            </ul>
        </div>
        <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
        <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
    </div>
</section>