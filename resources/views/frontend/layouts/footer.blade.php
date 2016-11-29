<footer id="footer" class="bl-block-footer uk-block-secondary bl-text-light">
    <div class="uk-container-center uk-container">
        <div class="top-footer uk-grid">
            <div class="uk-width-small-1-1 uk-width-medium-2-10 uk-text-center-small">
                <div class="uk-panel logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/frontend/img/logo.png') }}" alt=""></a>
                </div>
            </div>
            <div class="uk-width-small-1-1 uk-width-medium-3-10 uk-text-center-small">
                <div class="uk-panel">
                    <h3 class="uk-panel-title">Company</h3>
                    <div class="uk-margin">
                        <ul class="uk-nav uk-nav-side">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route('service::index') }}">Services</a></li>
                            <li><a href="{{ route('voucher::index' )}}">Vouchers</a></li>
                            <li><a href="{{ route('contact::index' )}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-width-small-1-1 uk-width-medium-3-10 uk-text-center-small">
                <div class="uk-panel">
                    <h3 class="uk-panel-title">Services</h3>
                    <div class="uk-margin">
                        <ul class="uk-nav uk-nav-side">
                        	@foreach(services() as $service)
                            	<li><a href="{{ route('service::show', $service->slug) }}">{{ $service->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-width-small-1-1 uk-width-medium-2-10 uk-text-center-small">
                <div class="uk-panel uk-text-center">
                    <h3 class="uk-panel-title">Connect</h3>
                    <div class="uk-width-1-1">
                        <form action="#" method="post" class="uk-form">
                            <input type="email" name="email" placeholder="Your awesome email" class="uk-width-1-1">
                            <br>
                            <button type="submit" class="uk-button bl-btn-outline">Subscribe</button>
                        </form>
                    </div>
                    <div class="uk-width-1-1 social">
                        <a class="uk-icon-button uk-icon-twitter" target="_blank" href="{{ setting('twitter') }}"></a>
                        <a class="uk-icon-button uk-icon-facebook" target="_blank" href="{{ setting('facebook') }}"></a>
                        <a class="uk-icon-button uk-icon-google" target="_blank" href="{{ setting('google') }}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="divider">
    <div class="uk-container-center uk-container">
        <div class="uk-text-muted uk-text-center bl-copyrights uk-text-small">
            <a href="#" class="copyright">© Broadlink Inc {{ date('Y') }}</a>
        </div>
    </div>
</footer>