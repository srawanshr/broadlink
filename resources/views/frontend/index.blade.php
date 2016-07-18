@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Home')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
    @include('frontend.partials.slider')
    <section id="our-services" class="uk-block uk-block-default uk-text-center">
        <div class="uk-container uk-container-center bl-text-light">
            <div class="uk-grid">
                <div class="uk-width-medium-6-10 uk-push-2-10">
                    <h1>Our Services</h1>
                    <ul class="uk-switcher height-2" id="services-list">
                        <li id="internet">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum rerum consequuntur asperiores perspiciatis, sed numquam provident, vel earum, delectus a illum tempora ab maxime fugiat voluptas atque. Voluptatum repudiandae sed neque, corporis incidunt. Earum, cumque repellat cupiditate aliquam consectetur aut consequatur, ipsam quis quae rem eveniet nemo neque. Accusamus, numquam.
                            </p>
                            <a href="#" class="uk-button bl-btn-outline">Buy</a>
                        </li>
                        <li id="broadtel">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic quos, laboriosam quam eaque, rerum dolorem natus officia atque possimus nesciunt unde fuga molestiae! Blanditiis autem repudiandae, nemo nisi impedit dignissimos in similique sequi deleniti error rerum ab sunt, neque amet.</p>
                            <a href="#" class="uk-button bl-btn-outline">Buy</a>
                        </li>
                        <li id="broadtv">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat ducimus dolores modi eveniet magni, illo sed suscipit veniam deleniti esse!</p>
                            <a href="#" class="uk-button bl-btn-outline">Buy</a>
                        </li>
                        <li id="bundle">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum dicta cupiditate id, ab, ducimus hic placeat quaerat autem nihil mollitia dolorum vitae neque sed totam at nisi magnam necessitatibus eligendi.</p>
                            <a href="#" class="uk-button bl-btn-outline">Buy</a>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="uk-grid" data-uk-switcher="{connect:'#services-list'}" data-bg-switcher>
                <li class="uk-width-1-4" data-bg="{{ asset('assets/frontend/img/bg-broadtv.jpg') }}">
                    <button class="uk-button uk-button-large hover-to-click" data-target="#internet" data-toggle="tab">
                        <span>
                            <i class="pe-7s-global pe pe-va"></i>
                        </span>
                        Internet
                    </button>
                </li>
                <li class="uk-width-1-4" data-bg="{{ asset('assets/frontend/img/bg-internet.jpg') }}">
                    <button class="uk-button uk-button-large hover-to-click" data-target="#broadtel" data-toggle="tab">
                        <span>
                            <i class="pe-7s-call pe pe-va"></i>
                        </span>
                        Broadtel
                    </button>
                </li>
                <li class="uk-width-1-4" data-bg="{{ asset('assets/frontend/img/bg-broadtel.jpg') }}">
                    <button class="uk-button uk-button-large hover-to-click" data-target="#broadtv" data-toggle="tab">
                        <span>
                            <i class="pe-7s-display1 pe pe-va"></i>
                        </span>
                        Broadtv
                    </button>
                </li>
                <li class="uk-width-1-4" data-bg="{{ asset('assets/frontend/img/bg-bundle.jpg') }}">
                    <button class="uk-button uk-button-large hover-to-click" data-target="#bundle" data-toggle="tab">
                        <span>
                            <i class="pe-7s-gift pe pe-va"></i>
                        </span>
                        Bundle
                    </button>
                </li>
            </ul>
        </div>
    </section>
    <section class="uk-block-primary uk-block bl-text-light uk-text-center">
        <div class="uk-container uk-container-center">
            <div class="uk-width">
                <div class="uk-width-medium-4-5 uk-push-1-10">
                    <h1>What our customers say</h1>
                    <div data-uk-slider>
                        <div class="uk-slider-container">
                            <ul class="uk-slider uk-grid-width-small-1-2">
                                <li>
                                    <p>There is only once choice when it comes to our marketing collateral, Tixy always deliver inspiring work on-time and budget.</p>
                                    <div class="quote-author">
                                        <img alt="Author" class="image-xs" src="{{ asset('assets/frontend/img/avatar3.png') }}">
                                        <h6 class="uppercase mb0">Natasha Canter</h6>
                                        <span>Vault</span>
                                    </div>
                                </li>
                                <li>
                                    <p>There is only once choice when it comes to our marketing collateral, Tixy always deliver inspiring work on-time and budget.</p>
                                    <div class="quote-author">
                                        <img alt="Author" class="image-xs" src="{{ asset('assets/frontend/img/avatar4.png') }}">
                                        <h6 class="uppercase mb0">Natasha Canter</h6>
                                        <span>Vault</span>
                                    </div>
                                </li>
                            </ul>
                        </div><!--end of row-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="news" class="uk-block uk-block-muted uk-text-centerp">
        <div class="uk-container uk-container-center">
            <div class="uk-grid">
                <div class="uk-width-medium-8-10 uk-push-1-10">
                    <ul class="uk-switcher height-2" id="news-switcher">
                        <li>
                            <h1>Customer</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dolorem quasi corporis ipsa, impedit sapiente, blanditiis repudiandae voluptatibus odio suscipit magnam reiciendis necessitatibus maxime voluptates ipsam! Praesentium aliquam vitae aperiam quaerat nobis quas repudiandae necessitatibus accusamus. Libero necessitatibus nemo quibusdam excepturi, dolores, incidunt iste autem facilis natus deserunt corporis, eaque.</p>
                        </li>
                        <li>
                            <h1>News</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate voluptates, voluptatibus, in corporis dolore unde eveniet earum libero? Eveniet, debitis omnis. Molestias sed ipsa fuga id hic velit, dolores qui illo. Officiis itaque, labore quae minima aut, obcaecati reprehenderit architecto.</p>
                        </li>
                        <li>
                            <h1>Magna Aliquems</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque aliquam sequi hic ex reprehenderit vitae nostrum, illo neque tempora, assumenda, fugit est eum libero aliquid dolorum officia consectetur quae. Error beatae non, doloribus? Facilis neque sequi delectus, nostrum commodi. Ab!</p>
                        </li>
                        <li>
                            <h1>settings</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, accusantium. Magni iure voluptatem consequatur quisquam, quaerat eum doloribus necessitatibus perspiciatis. Facere possimus aperiam temporibus illum, odit repellendus perferendis ullam unde porro reiciendis rerum debitis consequuntur suscipit esse perspiciatis hic sapiente.</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="uk-grid">
                <div class="uk-width-medium-5-10 uk-push-1-3">
                    <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#news-switcher'}">
                        <li class="uk-active"><a class="uk-button-large" href="#">Home</a></li>
                        <li><a class="uk-button-large" href="#">Profile</a></li>
                        <li><a class="uk-button-large" href="#">Messages</a></li>
                        <li><a class="uk-button-large" href="#">Settings</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="clients" class="uk-block uk-text-center">
        <div class="uk-container uk-container-center">
            <h1>We are connected to</h1>
            <div class="tile"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img1.png') }}" class="img-responsive"></a></div>
            <div class="tile"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img2.png') }}" class="img-responsive"></a></div>
            <div class="tile"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img3.png') }}" class="img-responsive"></a></div>
            <div class="tile"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img4.png') }}" class="img-responsive"></a></div>
            <div class="tile"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img5.png') }}" class="img-responsive"></a></div>
            <div class="tile"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img6.png') }}" class="img-responsive"></a></div>
            <div class="tile"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img7.png') }}" class="img-responsive"></a></div>
            <div class="tile"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img8.png') }}" class="img-responsive"></a></div>
            <div class="tile"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img9.png') }}" class="img-responsive"></a></div>
        </div>
    </section>
@stop

@section('footer')
    <script type="text/javascript">
        $(document).on('ready', function () {

            $('#slider').mousemove(function (e) {
                $('.image1').parallax(-40, e);
                $('.image2').parallax(-20, e);
                $('.image3').parallax(-10, e);
                $('.subtitle').parallax(30, e);
            });

            $('.hover-to-click').hover(function () {
                $(this).trigger('click');
            });

            $('ul[data-uk-switcher][data-bg-switcher]').on('show.uk.switcher', function(event, element){
                $('#our-services').css('background',"url('" + $(element).data('bg') +"')");
            });
        });
    </script>
@stop