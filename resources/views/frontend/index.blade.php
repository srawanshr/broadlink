@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Home')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
    @include('frontend.partials.slider')
    <section id="our-services" class="uk-block uk-block-default uk-margin-remove uk-padding-remove bl-text-dark">
        <div class="uk-grid uk-grid-collapse uk-margin-remove" id="internet">
            <div class="uk-width-medium-1-2 uk-cover" data-uk-scrollspy="{cls:'uk-animation-slide-left', topoffset: -100, repeat: true}">
                <img src="{{ asset('assets/frontend/img/bg-internet.jpg') }}" class="" alt="">
            </div>
            <div class="uk-width-medium-1-2 uk-vertical-align bl-service-description uk-text-medium-left" data-uk-scrollspy="{cls:'uk-animation-slide-right', topoffset: -100, repeat: true}">
                <div class="uk-vertical-align-middle">                
                    <h1>Internet</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consarum, delectus a illum tempocorporis incidunt. Earum, cumque repellat cupiditate aliquam consectetur aut consequatur, ipsam quis quae rem eveniet nemo neque. Accusamus, numquam.
                    </p>
                    <a href="#" class="uk-button bl-btn-outline">Buy</a>
                </div>
            </div>
        </div>
        <div class="uk-grid uk-grid-collapse uk-margin-remove" id="broadtel">
            <div class="uk-width-medium-1-2 uk-vertical-align bl-service-description uk-text-right" data-uk-scrollspy="{cls:'uk-animation-slide-left', topoffset: -100, repeat: true}">
                <div class="uk-vertical-align-middle">                
                    <h1>Broadtel</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic quos, lficia atque possimus nesciunt unde fuga molestiae! Blanditiis autem repudiandae, nemo nisi impedit dignissimos in similique sequi deleniti error rerum ab sunt, neque amet.
                    </p>
                    <a href="#" class="uk-button bl-btn-outline">Buy</a>
                </div>
            </div>
            <div class="uk-width-medium-1-2 uk-cover" data-uk-scrollspy="{cls:'uk-animation-slide-right', topoffset: -100, repeat: true}">
                <img src="{{ asset('assets/frontend/img/bg-broadtel.jpg') }}" class="" alt="">
            </div>
        </div>
        <div class="uk-grid uk-grid-collapse uk-margin-remove" id="broadtv">
            <div class="uk-width-medium-1-2 uk-cover" data-uk-scrollspy="{cls:'uk-animation-slide-left', topoffset: -100, repeat: true}">
                <img src="{{ asset('assets/frontend/img/bg-broadtv.jpg') }}" class="" alt="">
            </div>
            <div class="uk-width-medium-1-2 uk-vertical-align bl-service-description uk-text-medium-left" data-uk-scrollspy="{cls:'uk-animation-slide-right', topoffset: -100, repeat: true}">
                <div class="uk-vertical-align-middle">                
                    <h1>Broadtv</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit illo sed suscipit venicing elit illo sed suscipit veniam deleniti esse!
                    </p>
                    <a href="#" class="uk-button bl-btn-outline">Buy</a>
                </div>
            </div>
        </div>
        <div class="uk-grid uk-grid-collapse uk-margin-remove" id="bundle">
            <div class="uk-width-medium-1-2 uk-vertical-align bl-service-description uk-text-right">
                <div class="uk-vertical-align-middle" data-uk-scrollspy="{cls:'uk-animation-slide-left', topoffset: -100, repeat: true}">
                    <h1>Bundle</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur anihil mollitia dolorum vitae neque sed totam at nisi magnam necessitatibus eligendi.
                    </p>
                    <a href="#" class="uk-button bl-btn-outline">Buy</a>
                </div>
            </div>
            <div class="uk-width-medium-1-2 uk-cover" data-uk-scrollspy="{cls:'uk-animation-slide-right', topoffset: -100, repeat: true}">
                <img src="{{ asset('assets/frontend/img/bg-bundle.jpg') }}" class="" alt="">
            </div>
        </div>
    </section>
    <section class="uk-block-primary uk-block bl-text-light" id="customers">
        <div class="uk-container uk-container-center">
            <div class="uk-grid">
                <div class="uk-width-medium-1-2 uk-width-medium-1-3 uk-vertical-align uk-text-center-small" data-uk-scrollspy="{cls:'uk-animation-slide-left', topoffset: -100, repeat: true}">
                    <span class="uk-vertical-align-middle">
                        <h1>1000+ Customers</h1>
                        <p>Hundreds of businesses are already delivering successful Live Chat Support to keep their customers happy.</p>
                        <p>Get started for free and create your own success story.</p>
                    </span>
                </div>
                <div class="uk-width-medium-1-2 uk-width-medium-1-3 uk-text-center" data-uk-scrollspy="{cls:'uk-animation-scale-up', topoffset: -100, repeat: true}">
                    <img src="{{ asset('/assets/frontend/img/happy-img.png') }}" alt="">
                </div>
                <div class="uk-width-medium-1-3 uk-text-medium-right uk-text-center-small" data-uk-scrollspy="{cls:'uk-animation-slide-right', topoffset: -100, repeat: true}">
                    <div data-uk-slider>
                        <div class="uk-slider-container bl-quote-slider">
                            <ul class="uk-slider uk-grid-width-small-1-1">
                                <li>
                                    <div class="quote-author">
                                        <img alt="Author" class="image-xs" src="{{ asset('assets/frontend/img/avatar3.png') }}">
                                        <h6 class="uppercase mb0">Natasha Canter</h6>
                                        <span>Vault</span>
                                        <p>There is only once choice when it comes to our marketing collateral, Tixy always deliver inspiring work on-time and budget.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="quote-author">
                                        <img alt="Author" class="image-xs" src="{{ asset('assets/frontend/img/avatar4.png') }}">
                                        <h6 class="uppercase mb0">Natasha Canter</h6>
                                        <span>Vault</span>
                                        <p>There is only once choice when it comes to our marketing collateral, Tixy always deliver inspiring work on-time and budget.</p>
                                    </div>
                                </li>
                            </ul>
                        </div><!--end of row-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="news" class="uk-block uk-block-muted uk-text-center-small">
        <div class="uk-container uk-container-center">
            <div class="uk-grid">
                <div class="uk-width-medium-8-10 uk-push-1-10 " data-uk-scrollspy="{cls:'uk-animation-fade', topoffset:-100, repeat: true}">
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
                    <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#news-switcher'}" data-uk-scrollspy="{cls:'uk-animation-fade uk-invisible', target:' >li>a', delay:300, topoffset:-100, repeat: true}">
                        <li class="uk-active"><a class="uk-button-large uk-invisible" href="#">Home</a></li>
                        <li><a class="uk-button-large uk-invisible" href="#">Profile</a></li>
                        <li><a class="uk-button-large uk-invisible" href="#">Messages</a></li>
                        <li><a class="uk-button-large uk-invisible" href="#">Settings</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="clients" class="uk-block uk-text-center">
        <div class="uk-container uk-container-center" data-uk-scrollspy="{cls:'uk-animation-fade uk-invisible', target:'.tile', delay:300, topoffset:-100, repeat: true}">
            <h1>We are connected to</h1>
            <div class="tile uk-invisible"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img1.png') }}" class="img-responsive"></a></div>
            <div class="tile uk-invisible"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img2.png') }}" class="img-responsive"></a></div>
            <div class="tile uk-invisible"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img3.png') }}" class="img-responsive"></a></div>
            <div class="tile uk-invisible"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img4.png') }}" class="img-responsive"></a></div>
            <div class="tile uk-invisible"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img5.png') }}" class="img-responsive"></a></div>
            <div class="tile uk-invisible"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img6.png') }}" class="img-responsive"></a></div>
            <div class="tile uk-invisible"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img7.png') }}" class="img-responsive"></a></div>
            <div class="tile uk-invisible"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img8.png') }}" class="img-responsive"></a></div>
            <div class="tile uk-invisible"><a href="#"><img src="{{ asset('assets/frontend/img/connect_img9.png') }}" class="img-responsive"></a></div>
        </div>
    </section>
@stop

@section('footer')
    <script type="text/javascript">
        $(document).on('ready', function () {

            $('#slider').mousemove(function (e) {
                $('.image1').parallax(-40, e);
                $('.image2').parallax(-30, e);
                $('.image3').parallax(-20, e);
                $('.subtitle').parallax(60, e);
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