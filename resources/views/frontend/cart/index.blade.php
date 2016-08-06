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
                                <h2>Items in Your Cart</h2>
                            </div>
                            <div class="card-body">
                                <div class="uk-grid bl-padding">
                                    <div class="uk-width-1-6 uk-text-center">Service</div>
                                    <div class="uk-width-2-6">Name</div>
                                    <div class="uk-width-1-6">Action</div>
                                    <div class="uk-width-2-6 uk-text-right">Price</div>
                                </div>
                                @forelse( Cart::content() as $rowId => $item )
                                    <div class="uk-grid bl-padding">
                                        <div class="uk-width-1-6 uk-text-center">
                                            <img src="{{ $item->options->service->icon->path }}" class="img-icon">
                                        </div>
                                        <div class="uk-width-2-6">
                                            <div class="uk-text-large">{{ str_limit($item->name, 25) }}</div>
                                            <div class="uk-text-medium">
                                                {{ $item->options->service->name }}
                                            </div>
                                            </dl>
                                        </div>
                                        <div class="uk-width-1-6">
                                            {{ Form::open(['route' => ['cart::delete', $item->rowid], 'method'=>'DELETE']) }}
                                            <button type="submit" class="uk-button uk-button-sm uk-button-danger">
                                                <span>Remove</span>
                                            </button>
                                            {{ Form::close() }}
                                        </div>
                                        <div class="uk-width-2-6 uk-text-right">
                                            <p class="uk-text-medium">
                                               Rs. {{ $item->price }}
                                            </p>
                                        </div>
                                    </div>
                                @empty
                                    <h2>No items in Cart.</h2>
                                    <a href="{{ route('service::index') }}" class="btn btn-flat btn-primary ink-reaction text-lg">View Services</a>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-2-5">
                        <div class="bl-card uk-block-default">
                            <h2>Summary</h2>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">Sub Total</div>
                                <div class="uk-width-1-2 uk-text-right">Rs. {{ number_format(Cart::total(), 2) }}</div>
                                <div class="uk-width-1-2">VAT (13%)</div>
                                <div class="uk-width-1-2 uk-text-right">Rs. {{ number_format(Cart::total() * 0.13, 2) }}</div>
                                <div class="uk-width-1-2">Total</div>
                                <div class="uk-width-1-2 uk-text-right">Rs. {{ number_format(Cart::total() * 1.13, 2) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop