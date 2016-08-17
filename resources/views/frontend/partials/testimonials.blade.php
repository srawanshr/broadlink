<section class="bl-block-primary uk-block bl-text-light" id="customers">
    <div class="uk-container uk-container-center">
        <div class="uk-grid">
            <div class="uk-width-medium-1-2 uk-width-medium-1-3 uk-vertical-align uk-text-center-small" data-uk-scrollspy="{cls:'uk-animation-slide-left', topoffset: -100}">
                <span class="uk-vertical-align-middle">
                    <h1>1000+ Customers</h1>
                    <p>Hundreds of businesses are already delivering successful Live Chat Support to keep their customers happy.</p>
                    <p>Get started for free and create your own success story.</p>
                </span>
            </div>
            <div class="uk-width-medium-1-2 uk-width-medium-1-3 uk-text-center" data-uk-scrollspy="{cls:'uk-animation-scale-up', topoffset: -100}">
                <img src="{{ asset('/assets/frontend/img/happy-img.png') }}" alt="">
            </div>
            <div class="uk-width-medium-1-3 uk-text-medium-right uk-text-center-small" data-uk-scrollspy="{cls:'uk-animation-slide-right', topoffset: -100}">
                <div data-uk-slider class="uk-slidenav-position">
                    <div class="uk-slider-container bl-quote-slider">
                        <ul class="uk-slider uk-grid-width-small-1-1">
                            @foreach(testimonials() as $testimonial)
                                <li>
                                    <div class="quote-author uk-text-center">
                                        <img alt="Author" class="image-xs" src="{{ asset($testimonial->user->image->thumbnail()) }}">
                                        <h6 class="uppercase mb0">{{ $testimonial->user->display_name }}</h6>
                                        {{-- <span>{{ $testimonial->user->display_name }}</span> --}}
                                        <p>{!! $testimonial->quote !!}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
                    <a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
                </div>
            </div>
        </div>
    </div>
</section>