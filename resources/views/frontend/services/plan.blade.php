<div>
    <div class="uk-grid">
        <div class="uk-width-7-10">
            {!! $plan->description_html !!}
        </div>
        <div class="uk-width-3-10">
            <img src="{{ asset($plan->image->thumbnail(300,200)) }}">
        </div>
    </div>
    
</div>
<ul class="uk-tab bl-tab" data-uk-tab="{connect:'#service-internet'}">
    <li class="uk-active"><a href="javascript:void(0);"><img src="{{ asset('/assets/frontend/img/broad_wifi.png') }}"> </a></li>
    <li><a href="javascript:void(0);"><img src="{{ asset('/assets/frontend/img/broad_fiber.png') }}"></a></li>
</ul>
<ul class="uk-switcher bl-switcher" id="service-internet">
    <li class="uk-text-center">
        <div class="uk-grid uk-grid-large">
            @for($i=1;$i<=3;$i++)
                <div class="uk-width-small-1-1 uk-width-medium-1-3">
                    <div class="bl-package">
                        <div class="uk-grid">
                            <div class="uk-panel">
                                <div class="uk-width-1-1 bl-package-title">
                                    <h3>My Choice</h3>
                                </div>
                                <div class="uk-width-1-1 bl-package-featured-image">
                                    <img src="{{ asset('assets/frontend/img/service_package_1.jpg') }}">
                                </div>
                                <div class="uk-width-1-1 bl-package-price">
                                    <span>2000</span>
                                </div>
                                <div class="uk-width-1-1">
                                    <h3>Basic Here</h3>
                                    <p>Free 1 Mbps unlimited Internet</p>
                                    <button class="uk-button">More</button>
                                </div>
                                <div class="uk-width-1-1">
                                    <p>Free <a href="#">BroadTV</a></p>
                                    <p><i class="uk-icon-television uk-icon-large"></i></p>
                                    <p>All HD channels</p>
                                </div>
                                <div class="uk-width-1-1">
                                    <p>
                                        Free Rs.100 Local Calls in <a href="#">BroadTel</a>
                                    </p>
                                    <button class="uk-button uk-width-1-1 uk-button-large uk-button-success">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </li>
    <li>b</li>
</ul>