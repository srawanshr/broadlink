<section id="slider" class="uk-height-viewport">
    <div data-uk-slider="{autoplay: true, pauseOnHover: false}" class="uk-slidenav-position">
        <div class="uk-slider-container">
            <ul class="uk-slider uk-grid-width-small-1-1">
                <li>
                    <div class="bg"
                         style="background: url('{{ asset('assets/frontend/img/background.jpg') }}'); background-size: cover; background-repeat: no-repeat;">
                        <div class="uk-container uk-container-center">
                            <div class="uk-grid main-slider full-height">
                                <div class="uk-width-small-1-1 uk-width-medium-6-10">
                                    <div class="images">
                                        <div class="image image1">
                                            <img src="{{ asset('assets/frontend/img/laptop2.png') }}" alt="" class="img-responsive">
                                        </div>
                                        <div class="image image2">
                                            <img src="{{ asset('assets/frontend/img/tablet.png') }}" alt="" class="img-responsive">
                                        </div>
                                        <div class="image image3">
                                            <img src="{{ asset('assets/frontend/img/phone.png') }}" alt="" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-width-small-1-1 uk-width-medium-4-10 uk-vertical-align bl-text-light">
                                    <div class="uk-vertical-align-middle subtitle">
                                        <h1 class="heading1">This is the main title</h1>
                                        <p class="heading2 hidden-xs">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Numquam aut laborum dolores ex voluptate soluta eveniet sed quod accusantium
                                            aspernatur....</p>
                                        <p class="link"><a href="#">A button</a></p>
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
                            <div class="uk-grid main-slider full-height">
                                <div class="uk-width-small-1-1 uk-width-medium-6-10 uk-vertical-align">
                                    <div class="images uk-vertical-align-middle">
                                        <div class="image image1">
                                            <img src="{{ asset('assets/frontend/img/bg.png') }}" alt="" class="img-responsive">
                                        </div>
                                        <div class="image image2">
                                            <img src="{{ asset('assets/frontend/img/fg.png') }}" alt="" class="img-responsive">
                                        </div>
                                        <div class="image image3">
                                            <img src="{{ asset('assets/frontend/img/signal.png') }}" alt="" class="img-responsive">
                                        </div>
                                        <div class="image image4">
                                            <img src="{{ asset('assets/frontend/img/people.png') }}" alt="" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-width-small-1-1 uk-width-medium-4-10 uk-vertical-align bl-text-light">
                                    <div class="uk-vertical-align-middle subtitle">
                                        <h1 class="heading1">This is the main title</h1>
                                        <p class="heading2 hidden-xs">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Numquam aut laborum dolores ex voluptate soluta eveniet sed quod accusantium
                                            aspernatur....</p>
                                        <p class="link"><a href="#">A button</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
        <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
    </div>
</section>