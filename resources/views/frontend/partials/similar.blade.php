<section class="uk-block uk-margin-top uk-padding-remove bl-text-dark services" xmlns="http://www.w3.org/1999/html">
    <div class="uk-container uk-container-center uk-block-default bl-padding">
        <div data-uk-slideset="{small:1, medium: 4}">
            <div class="uk-slidenav-position">
                <ul class="uk-grid uk-slideset">
                    @foreach( vouchers() as $voucher)
                        <li>
                            <a href="{{ route('voucher::show', str_slug($voucher->voucher)) }}">
                                <img src="{{ asset('assets/frontend/img/'.$voucher->voucher.'.png') }}" class="uk-width-1-1">
                                <div class="uk-float-left">
                                    {{ $voucher->voucher }}
                                </div>
                            </a>
                            <div class="uk-float-right">
                                <a href="{{ route('voucher::show', str_slug($voucher->voucher)) }}">
                                    <i class="material-icons">&#xE88E;</i>
                                </a>
                                <a href="{{ route('voucher::buy', str_slug($voucher->voucher)) }}">
                                    <i class="material-icons">&#xE854;</i>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
                <a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
            </div>
        </div>
    </div>
</section>