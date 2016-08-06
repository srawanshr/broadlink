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
            @foreach($plan->products as $product)
                <div class="uk-width-small-1-1 uk-width-medium-1-3">
                    <div class="bl-package">
                        <div class="uk-grid">
                            <div class="uk-panel">
                                <div class="uk-width-1-1 bl-package-title">
                                    <h3>{{ $product->name }}</h3>
                                </div>
                                <div class="uk-width-1-1 bl-package-featured-image">
                                    <img src="{{ asset($product->image->thumbnail(312,190)) }}">
                                </div>
                                <div class="uk-width-1-1 bl-package-price">
                                    <span>Rs. {{ $product->price }}</span>
                                </div>
                                <div class="uk-width-1-1">
                                    {!! $product->description_html !!}
                                </div>
                                <div class="uk-width-1-1">
                                    <a class="uk-button uk-width-1-1 uk-button-large uk-button-success" href="{{ route('service::buy', [ $service->slug, $product->slug ]) }}">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </li>
    <li>b</li>
</ul>