@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Cart')

@section('body')
    @include('frontend.partials.banner', ['title' => 'Cart' ])
    <section id="cart-index" class="uk-block bl-text-dark">
        <div class="uk-container uk-container-center bl-margin-top-ve">
            <div class="uk-margin-large-bottom">
                <div class="uk-grid">
                    <div class="uk-width-medium-3-5">
                        <div class="bl-card card-underline uk-block-default">
                            <div class="card-heading">
                                @if(Cart::content()->count() > 0)
                                    <h2>Items in Your Cart</h2>
                                @else
                                    <h2>No items in Cart.</h2>
                                @endif
                            </div>
                            <div class="card-body">
                                @forelse( Cart::content() as $rowId => $item )
                                    <hr class="uk-grid-divider uk-margin">
                                    {{ Form::open(['route' => ['cart::delete', $item->rowid], 'method'=>'DELETE']) }}
                                    <div class="uk-panel uk-panel-box">
                                        <button type="button" class="uk-close bl-confirm-submit"></button>
                                        <div class="uk-grid bl-padding">
                                            <div class="uk-width-1-6 uk-text-center">
                                                <img src="{{ image('assets/frontend/img/'.$item->name.'.png') }}" class="img-icon">
                                            </div>
                                            <div class="uk-width-2-6">
                                                <div class="uk-text-large">{{ str_limit($item->name, 25) }}</div>
                                                <div class="uk-text-medium">
                                                    Recharge Voucher
                                                </div>
                                            </div>
                                            <div class="uk-width-2-6 uk-text-right">
                                                <div class="uk-text-large">
                                                    {{ $item->qty }} x
                                                </div>
                                            </div>
                                            <div class="uk-width-1-6 uk-text-right">
                                                <p class="uk-text-medium uk-text-bold">
                                                   Rs. {{ $item->price }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    {{ Form::close() }}
                                @empty
                                    <a href="{{ route('service::index') }}" class="btn btn-flat btn-primary ink-reaction text-lg">View Services</a>
                                @endforelse
                                <div class="bl-padding uk-text-right">
                                    * Payment options can be selected in the Checkout
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-2-5">
                        <div data-uk-sticky="{boundary:'#boundary', 'top': 50}">
                            <div class="bl-card uk-block-default">
                                <h2>Summary</h2>
                                <div class="uk-grid">
                                    <div class="uk-width-1-2">Sub Total</div>
                                    <div class="uk-width-1-2 uk-text-right uk-text-bold uk-text-large">Rs. {{ number_format(Cart::total(), 2) }}</div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-2">VAT (13%)</div>
                                    <div class="uk-width-1-2 uk-text-right uk-text-bold uk-text-large">Rs. {{ number_format(Cart::total() * 0.13, 2) }}</div>
                                </div>
                                <hr class="uk-grid-divider">
                                <div class="uk-grid">
                                    <div class="uk-width-1-2">Total</div>
                                    <div class="uk-width-1-2 uk-text-right uk-text-bold uk-text-large">Rs. {{ number_format(Cart::total() * 1.13, 2) }}</div>
                                </div>
                            </div>
                            <div class="bl-card uk-block-default uk-padding-remove">
                                <a href="{{ route('service::index') }}" class="uk-button uk-button-default uk-widthi-1-1 uk-button-large">Continue Shopping <i class="material-icons uk-vertical-align-middle">&#xE854;</i></a>
                                <a href="{{ route('cart::payment') }}" class="uk-button uk-button-success uk-widthi-1-1 uk-button-large">Proceed to Checkout <i class="material-icons uk-vertical-align-middle">&#xE8A1;</i></a>
                            </div>
                            <div class="uk-panel uk-panel-box uk-margin-top bl-card uk-text-center uk-block-default">
                            <h3 class="uk-margin-top">Questions?</h3>
                            If you have questions about your purchase, or any other issues <a href="{{ route('help::index') }}">Visit Our Help Center</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="boundary"></div>
            </div>
        </div>
    </section>
</div>
@stop

@section('footer')
<script type="text/javascript">
    $(document).ready(function() {
        $('.bl-checkout.empty').click(function() {
            UIkit.modal.alert("Your cart in empty. Please consider buying some service.");
        });
        $('.bl-confirm-submit').click(function() {
            $btn = $(this);
            UIkit.modal.confirm("Are you sure you want to remove this item from the cart?", function(){
                $btn.closest('form').submit();
            });
        });
    });
</script>
@stop