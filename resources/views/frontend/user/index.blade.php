@extends('frontend.layouts.master')

@section('title', 'Dashboard')

@section('body')
    @include('frontend.partials.banner', ['title' => 'Dashboard'])
    <section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark">
        <div class="uk-container bl-block-default uk-container-center bl-margin-top-ve uk-width-medium-7-10 uk-padding-remove"
             id="user-profile">
            <div class="uk-grid uk-grid-collapse">
                @include('frontend.user.partials.menu')
                <div class="uk-width-4-5">
                    <div class="uk-grid">
                        <div class="uk-width-small-1 uk-margin-large-top">
                            <div class="bl-padding-2-lr">
                                <h2>Welcome to My Account</h2>
                                <p>This is your dashboard. Here, you can view or edit your profile details, update your
                                   password, view your payment history and pins and get access to other useful links. If
                                   you have any problems you can drop a trouble ticket too.</p>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-1 uk-margin-top">
                            <div class="bl-padding-2-lr">
                                <h2>Quick Links</h2>
                                <a href="{{ setting('internet-login') }}" class="uk-panel bl-tile">
                                    <i class="uk-icon uk-icon-user"></i>
                                    <span>My Internet Login</span>
                                </a>
                                <a href="{{ setting('self-care-login') }}" class="uk-panel bl-tile">
                                    <i class="uk-icon uk-icon-send"></i>
                                    <span>My Self Care Login</span>
                                </a>
                                <a href="{{ route('service::index') }}" class="uk-panel bl-tile">
                                    <i class="uk-icon uk-icon-dollar"></i>
                                    <span>Recharge Account</span>
                                </a>
                                <a href="{{ route('contact::index') }}" class="uk-panel bl-tile">
                                    <i class="uk-icon uk-icon-sticky-note"></i>
                                    <span>Trouble Ticket</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-small-1-1 uk-margin-top">
                            <div class="bl-padding-2-lr">
                                <h2>Purchase History</h2>
                                <ul class="uk-tab" data-uk-tab="{connect:'#purchase-history'}">
                                    <li class="uk-active">
                                        <a href="">Orders</a>
                                    </li>
                                    <li>
                                        <a href="">Pins</a>
                                    </li>
                                </ul>
                                <ul id="purchase-history" class="uk-switcher">
                                    <li class="uk-active">
                                        <table class="uk-table">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Paid Via</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse( $user->invoices as $invoice )
                                                <tr>
                                                    <td>{{ $invoice->date }}</td>
                                                    <td>{{ $invoice->payable_type }}</td>
                                                    <td>{{ $invoice->total }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">No Orders</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <table class="uk-table">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Product Name</th>
                                                <th>PIN</th>
                                                <th>Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($user->orders as $order)
                                                <tr>
                                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                                    <td>{{ $order->product->name }}</td>
                                                    <td>{{ $order->pin->pin }}</td>
                                                    <td>
                                                        {{ $order->pin->voucher }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">No PINS</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop