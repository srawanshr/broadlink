<footer id="footer" class="bl-block-footer bl-text-light">
    <div class="uk-container-center uk-container">
        <div class="top-footer uk-grid">
            <div class="uk-width-small-1-1 uk-width-medium-1-3">
                <div class="uk-panel">
                    <h3>Stay Connected</h3>
                    <div class="uk-width-1-1 uk-margin">
                        <form action="{{ url('subscribe') }}" method="post" class="uk-form">
                            {{ csrf_field() }}
                            <input type="email" name="email" class="uk-form-large footer-input" placeholder="Your awesome email" required>
                            <button type="submit" class="uk-button uk-button-primary uk-button-large">Sign Up</button>
                        </form>
                    </div>
                    <div class="uk-width-1-1 social">
                        <a class="uk-icon-button uk-icon-twitter" target="_blank" href="{{ setting('twitter') }}"></a>
                        <a class="uk-icon-button uk-icon-facebook" target="_blank" href="{{ setting('facebook') }}"></a>
                        <a class="uk-icon-button uk-icon-google" target="_blank" href="{{ setting('google') }}"></a>
                    </div>
                </div>
            </div>
            <div class="uk-width-small-1-1 uk-width-medium-1-3 uk-text-center-small">
                <h3>Navigate</h3>
                <div class="uk-grid">
                    <div class="uk-grid-1-2">
                        <div class="uk-panel">
                            <div class="uk-margin">
                                <ul class="uk-nav uk-nav-side">
                                    <li><a href="{{ url('/') }}"><i class="material-icons">&#xE5CC;</i> Home</a></li>
                                    <li><a href="{{ route('service::index') }}"><i class="material-icons">&#xE5CC;</i> Services</a></li>
                                    <li><a href="{{ route('page::show','about') }}"><i class="material-icons">&#xE5CC;</i> About Us</a></li>
                                    <li><a href="{{ route('voucher::index') }}"><i class="material-icons">&#xE5CC;</i> Vouchers</a></li>
                                    <li><a href="{{ route('contact::index') }}"><i class="material-icons">&#xE5CC;</i> Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="uk-grid-1-2">
                        <div class="uk-panel">
                            <div class="uk-margin">
                                <ul class="uk-nav uk-nav-side">
                                    @foreach(services() as $service)
                                        <li>
                                            <a href="{{ route('service::show', $service->slug) }}"><i class="material-icons">&#xE5CC;</i> {{ $service->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-small-1-1 uk-width-medium-1-3 uk-text-center">
                <img src="{{ asset('assets/frontend/img/callus.png') }}">
            </div>
        </div>
    </div>
    <span class="fading-line"></span>
    <div class="uk-container-center uk-container bl-copyrights">
        <div class="uk-text-muted uk-text-center">
            © Broadlink Network and Communication Pvt. Ltd., {{ str_replace('|',', ', setting('address')) }}
        </div>
    </div>
    <span class="fading-line"></span>
    <div class="uk-container-center uk-container uk-margin">
        <div class="uk-grid uk-grid-divider uk-grid-large uk-text-muted uk-text-center uk-text-small">
            <div class="uk-width-1-3"><a href="{{ route('page::show','terms') }}" class="uk-text-muted">Terms & Condition</a></div>
            <div class="uk-width-1-3"><a href="{{ route('page::show','privacy') }}" class="uk-text-muted">Privacy Policy</a></div>
            <div class="uk-width-1-3"><a href="{{ route('page::show','sitemap') }}" class="uk-text-muted">Sitemap</a></div>
        </div>
    </div>
</footer>