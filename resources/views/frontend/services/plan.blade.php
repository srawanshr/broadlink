<div>
    <div class="uk-grid">
        <div class="uk-width-1-1 bl-padding-tb">
            {!! $plan->description_html !!}
        </div>
    </div>
</div>

<div class="bl-plans uk-text-center">
    <div class="uk-grid">
        <div class="uk-width-small-1-1 {{ $plan->image ? 'uk-width-medium-7-10' : ''}}">
            <div class="uk-grid uk-grid-large">
                @foreach($plan->products as $product)
                    <div class="uk-width-small-1-1 uk-width-medium-1-{{ $plan->products->count() }}">
                        <div class="uk-panel">
                            <div class="bl-package">
                                <div class="uk-grid">
                                    <div class="uk-width-1-1 bl-package-title">
                                        <h3 data-uk-sticky="{animation: 'uk-animation-slide-top', boundary: '#sticky-boundary'}">{{ $product->name }}</h3>
                                    </div>
                                    {{-- <div class="uk-width-1-1 bl-package-featured-image">
                                        <img src="{{ asset($product->image->thumbnail(342,209)) }}">
                                    </div> --}}
                                    {{-- <div class="uk-width-1-1 bl-package-price">
                                        <span>Rs. {{ $product->price }}</span>
                                    </div> --}}
                                    <div class="uk-width-1-1">
                                        {!! $product->description_html !!}
                                    </div>
                                    <div class="uk-width-1-1">
                                        <a class="uk-button uk-width-1-1 uk-button-large uk-button-success" href="{{ route('service::orderForm', [ $service->slug, $product->slug ]) }}">Order Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div id="sticky-boundary"></div>
            </div>
        </div>
        @if($plan->image)
            <div class="uk-width-small-1-1 uk-width-medium-3-10">
                {!! $plan->image ? "<img src='".asset($plan->image->thumbnail(350,515))."'>": '' !!}
            </div>
        @endif
    </div>
</div>
