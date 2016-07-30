@extends('frontend.layouts.master')

@section('body')
	@include('frontend.partials.banner', ['title' => 'Dashboard'])
    <section class="uk-block uk-block-default uk-block-large">
    	<div class="uk-container uk-container-center">
    		<div class="uk-grid bl-tab-left-container">
    			<div class="uk-width-medium-3-4">
    				<div class="uk-grid">
						<ul class="uk-tab uk-tab-left uk-width-small-4-10 uk-width-medium-2-10">
						    <li class="uk-active">
						    	<a href="#" class="uk-text-center">
						    		<i class="uk-width-1-1 uk-icon-medium uk-icon-home"></i>
						    		<span class="uk-hidden-small">Home</span>
					    		</a>
					    	</li>
						    <li>
						    	<a href="#" class="uk-text-center">
						    		<i class="uk-width-1-1 uk-icon-medium uk-icon-history"></i>
						    		<span class="uk-hidden-small">History</span>
					    		</a>
					    	</li>
						    <li>
						    	<a href="#" class="uk-text-center">
						    		<i class="uk-width-1-1 uk-icon-medium uk-icon-money"></i>
						    		<span class="uk-hidden-small">Payments</span>
					    		</a>
					    	</li>
						    <li>
						    	<a href="#" class="uk-text-center">
						    		<i class="uk-width-1-1 uk-icon-medium uk-icon-user"></i>
						    		<span class="uk-hidden-small">Profile</span>
					    		</a>
					    	</li>
						    <li>
						    	<a href="#" class="uk-text-center">
						    		<i class="uk-width-1-1 uk-icon-medium uk-icon-cart-plus"></i>
						    		<span class="uk-hidden-small">Cart</span>
					    		</a>
					    	</li>
						</ul>
						<div class="uk-tab-left-content uk-width-small-6-10 uk-width-medium-8-10">
							hello
						</div>
					</div>
				</div>
				<div class="uk-width-medium-1-4">
					user panel
				</div>
			</div>
    	</div>
	</section>
@stop