@extends('frontend.layouts.master')

@section('title', 'Dashboard')

@section('body')
    @include('frontend.partials.banner', ['title' => 'Dashboard'])
    <section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark">
        <div class="uk-container bl-block-default uk-container-center bl-margin-top-ve uk-width-medium-7-10 uk-padding-remove" id="user-profile">
            <div class="uk-grid uk-grid-collapse">
                @include('frontend.user.partials.menu')
                <div class="uk-width-4-5">
                    <div class="uk-grid">
                        <div class="uk-width-small-1 uk-margin-large-top">
                            <div class="bl-padding-2-lr">
                                <h2>Welcome to My Account</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos natus illum magni cum
                                    vitae quibusdam, tenetur laboriosam mollitia iste distinctio quae ab sunt, fugiat
                                    necessitatibus eaque, rem hic. Repellendus, libero!</p>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-2 uk-margin-top">
                            <div class="bl-padding-2-lr">
                                <h2>Account Details</h2>
                                <ul class="uk-list">
                                    <li>
                                        <a href="{{ route('user::edit') }}">Update your profile</a>
                                    </li>
                                    <li>
                                        <a href="#">Check the usage</a>
                                    </li>
                                    <li>
                                        <a href="#">Discover more features</a>
                                    </li>
                                    <li>
                                        <a href="#">Manage Subscriptions</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-2 uk-margin-top">
                            <div class="bl-padding-2-lr">
                                <h2>Quick Links</h2>
                                <a href="#" class="uk-panel bl-tile">
                                    <i class="uk-icon uk-icon-user"></i>
                                    <span>My Internet Login</span>
                                </a>
                                <a href="#" class="uk-panel bl-tile">
                                    <i class="uk-icon uk-icon-send"></i>
                                    <span>My Self Care Login</span>
                                </a>
                                <a href="#" class="uk-panel bl-tile">
                                    <i class="uk-icon uk-icon-dollar"></i>
                                    <span>Recharge Account</span>
                                </a>
                                <a href="#" class="uk-panel bl-tile">
                                    <i class="uk-icon uk-icon-sticky-note"></i>
                                    <span>Trouble Ticket</span>
                                </a>
                            </div>
                        </div>
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
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>2016/1/2</td>
                                                <td>Broadlink 500</td>
                                                <td>1</td>
                                                <td>
                                                    <a href="#">View Details</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2016/1/2</td>
                                                <td>Broadlink 500</td>
                                                <td>1</td>
                                                <td>
                                                    <a href="#">View Details</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2016/1/2</td>
                                                <td>Broadlink 500</td>
                                                <td>2</td>
                                                <td>
                                                    <a href="#">View Details</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2016/1/2</td>
                                                <td>Broadlink 500</td>
                                                <td>1</td>
                                                <td>
                                                    <a href="#">View Details</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <table class="uk-table">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>2016/1/2</td>
                                                <td>Broadlink 500</td>
                                                <td>1</td>
                                                <td>
                                                    <a href="#">View Details</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2016/1/2</td>
                                                <td>Broadlink 500</td>
                                                <td>1</td>
                                                <td>
                                                    <a href="#">View Details</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2016/1/2</td>
                                                <td>Broadlink 500</td>
                                                <td>1</td>
                                                <td>
                                                    <a href="#">View Details</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2016/1/2</td>
                                                <td>Broadlink 500</td>
                                                <td>1</td>
                                                <td>
                                                    <a href="#">View Details</a>
                                                </td>
                                            </tr>
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