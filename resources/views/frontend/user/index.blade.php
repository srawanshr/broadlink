@extends('frontend.layouts.master')

@section('body')
	@include('frontend.partials.banner', ['title' => 'Dashboard'])
    <section class="uk-block bl-block-default uk-block-large">
    	<div class="uk-container uk-container-center uk-width-medium-7-10 uk-padding-remove" id="user-profile">
			<div class="uk-grid uk-grid-collapse">
				<div class="uk-width-1-5 bl-block-primary">
					<div class="uk-cover-background">
						<img src="{{ asset('assets/frontend/img/avatar4.png') }}" class="uk-width-1-1">
					</div>
					<div class="bl-padding uk-block-default bl-block-primary-lightest">
						Srawan Shrestha
					</div>
					<div class="offer bl-padding bl-block-primary-lighter">
						<ul class="fa-ul">
						 	<li>
								<i class="fa-li uk-icon uk-icon-star"></i>
								<a href="#">Get More from Broadlink with a premium  account</a>
							</li>
						</ul>
					</div>
					<div class="details bl-padding bl-block-primary-light">
						<ul class="fa-ul">
							<li>
								<i class="fa-li uk-icon uk-icon-dollar"></i>
								<a href="#">Earn more Broadlink Credits</a>
							</li>
							<li>
								<i class="fa-li uk-icon uk-icon-calendar"></i>
								<a href="#">Extend Subscription</a>
							</li>
							<hr />
							<li>
								<i class="fa-li uk-icon uk-icon-ticket"></i>
								<a href="#">Redeem your voucher</a>
							</li>
							<li>
								<i class="fa-li uk-icon uk-icon-asterisk"></i>
								<a href="#">Change password</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="uk-width-medium-4-5">
					<div class="uk-grid">
						<div class="uk-width-small-1 uk-margin-large-top">
							<div class="bl-padding-2-lr">
								<h2>Welcome to My Account</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos natus illum magni cum vitae quibusdam, tenetur laboriosam mollitia iste distinctio quae ab sunt, fugiat necessitatibus eaque, rem hic. Repellendus, libero!</p>
								<ul class="uk-list">
									<li>Update your profile</li>
									<li>Check the usage</li>
									<li>Discover more features</li>
									<li>Manage Subscriptions</li>
								</ul>
							</div>
						</div>
						<div class="uk-width-medium-1-2 uk-margin-top">
							<div class="bl-padding-2-lr">
								<h2>Account Details</h2>
								<ul class="uk-list">
									<li><a href="#">Update your profile</a></li>
									<li><a href="#">Check the usage</a></li>
									<li><a href="#">Discover more features</a></li>
									<li><a href="#">Manage Subscriptions</a></li>
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
								<h2>Usage (Last 30 days)</h2>
								<div class="uk-grid">
									<div class="uk-width-small-1-3">
										<i class="uk-icon uk-icon-large uk-icon-phone"></i>
										<span>
											<b>0</b>
											<div>mins to mobiles and landlines</div>
										</span>
									</div>
									<div class="uk-width-small-1-3">
										<i class="uk-icon uk-icon-large uk-icon-lock"></i>
										<span>
											<b>1</b>
											<div>sms messages</div>
										</span>
									</div>
									<div class="uk-width-small-1-3">
										<i class="uk-icon uk-icon-large uk-icon-signal"></i>
										<span>
											<b>2</b>
											<div>mins of Broadlink Wifi</div>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="uk-width-small-1-1 uk-margin-top">
							<div class="bl-padding-2-lr">
								<h2>Purchase History</h2>
								<ul class="uk-tab" data-uk-tab="{connect:'#purchase-history'}">
                                    <li class="uk-active"><a href="">Orders</a></li>
                                    <li><a href="">Pins</a></li>
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
													<td><a href="#">View Details</a></td>
												</tr>
												<tr>
													<td>2016/1/2</td>
													<td>Broadlink 500</td>
													<td>1</td>
													<td><a href="#">View Details</a></td>
												</tr>
												<tr>
													<td>2016/1/2</td>
													<td>Broadlink 500</td>
													<td>2</td>
													<td><a href="#">View Details</a></td>
												</tr>
												<tr>
													<td>2016/1/2</td>
													<td>Broadlink 500</td>
													<td>1</td>
													<td><a href="#">View Details</a></td>
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
													<td><a href="#">View Details</a></td>
												</tr>
												<tr>
													<td>2016/1/2</td>
													<td>Broadlink 500</td>
													<td>1</td>
													<td><a href="#">View Details</a></td>
												</tr>
												<tr>
													<td>2016/1/2</td>
													<td>Broadlink 500</td>
													<td>1</td>
													<td><a href="#">View Details</a></td>
												</tr>
												<tr>
													<td>2016/1/2</td>
													<td>Broadlink 500</td>
													<td>1</td>
													<td><a href="#">View Details</a></td>
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