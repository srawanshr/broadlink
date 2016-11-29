<section class="uk-block uk-margin-top uk-padding-remove bl-text-dark services" xmlns="http://www.w3.org/1999/html">
    @if(isset($title))
        <div class="uk-container uk-container-center bl-padding">
            <h2>{{ $title }}</h2>
        </div>
    @endif
    <div class="uk-container uk-container-center uk-block-default bl-padding">
        <ul class="uk-grid">
            @foreach( vouchers()->take(4) as $voucher)
                <li>
                    <figure class="uk-overlay uk-overlay-hover uk-hover">
                        <img src="{{ image('assets/frontend/img/'.str_slug($voucher->voucher).'.png') }}" class="uk-overlay-spin">
                        <figcaption class="uk-overlay-panel uk-overlay-slide-bottom uk-overlay-bottom uk-overlay-background uk-text-center bl-text-light">
                            <h2>Rs. {{ $voucher->voucher }}</h2>
                            <a href="{{ route('voucher::show', str_slug($voucher->voucher)) }}" class="uk-button uk-button-large bl-button">
                                <i class="material-icons uk-vertical-align-middle">&#xE88E;</i>
                                View
                            </a>
                            <a href="{{ route('voucher::buy', str_slug($voucher->voucher)) }}" class="uk-button uk-button-large bl-button">
                                <i class="material-icons uk-vertical-align-middle">&#xE854;</i>
                                Add to Cart
                            </a>
                        </figcaption>
                    </figure>
                </li>
            @endforeach
        </ul>
    </div>
</section>