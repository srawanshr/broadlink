<section id="news" class="uk-block uk-block-default uk-text-center uk-padding-remove height-5">
	<div class="bl-background-slider height-5">
        <div class="uk-slidenav-position" data-uk-slideshow="{kenburns:true, autoplay:true}">
            <ul class="uk-slideshow">
                <li><img src="{{ asset('assets/frontend/img/bg-broadtv.jpg') }}" class="height-5"></li>
                <li><img src="{{ asset('assets/frontend/img/bg-internet.jpg') }}" class="height-5"></li>
                <li><img src="{{ asset('assets/frontend/img/bg-broadtel.jpg') }}" class="height-5"></li>
            </ul>
        </div>
    </div>
    <div class="uk-container uk-container-center bl-padding-2-tb">
    	<div class="uk-margin" data-uk-slideset="{animation: 'scale', medium:4, small:3}">
	        <div class="uk-slidenav-position uk-margin">
	            <ul class="uk-slideset uk-grid uk-flex-center">
	            	@foreach(tags()->pluck('posts')->flatten()->unique('id') as $post)
	                	<li data-uk-filter="{{ $post->tags->implode('tag', ',') }}"><img src="{{ $post->image ? asset($post->image->thumbnail()) : asset(config('paths.placeholder.post')) }}" width="600" height="400" alt=""></li>
	                @endforeach
	            </ul>
	            <a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
	            <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
	        </div>
	        <ul class="uk-slideset-nav uk-dotnav uk-flex-center"></ul>
	        <div class="uk-tab-center">
		        <ul class="uk-subnav uk-subnav-pill uk-tab">
		        	@foreach(tags() as $key => $tag)
		            	<li data-uk-filter="{{ $tag->tag }}">
		            		<a>
		            			<i class="material-icons">{{ $tag->icon }}</i>
		            			<div>{{ $tag->title }}</div>
	            			</a>
	            		</li>
		            @endforeach
		        </ul>
	        </div>
	    </div>
    </div>
    
    {{-- <div class="uk-container uk-container-center bl-text-light">
        <div class="uk-grid">
            <div class="uk-width-medium-6-10 uk-push-2-10">
                <ul class="uk-switcher height-2" id="services-list">
                    <li id="internet">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum rerum consequuntur asperiores perspiciatis, sed numquam provident, vel earum, delectus a illum tempora ab maxime fugiat voluptas atque. Voluptatum repudiandae sed neque, corporis incidunt. Earum, cumque repellat cupiditate aliquam consectetur aut consequatur, ipsam quis quae rem eveniet nemo neque. Accusamus, numquam.
                        </p>
                        <a href="#" class="uk-button bl-btn-outline">Buy</a>
                    </li>
                    <li id="broadtel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic quos, laboriosam quam eaque, rerum dolorem natus officia atque possimus nesciunt unde fuga molestiae! Blanditiis autem repudiandae, nemo nisi impedit dignissimos in similique sequi deleniti error rerum ab sunt, neque amet.</p>
                        <a href="#" class="uk-button bl-btn-outline">Buy</a>
                    </li>
                    <li id="broadtv">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat ducimus dolores modi eveniet magni, illo sed suscipit veniam deleniti esse!</p>
                        <a href="#" class="uk-button bl-btn-outline">Buy</a>
                    </li>
                    <li id="bundle">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum dicta cupiditate id, ab, ducimus hic placeat quaerat autem nihil mollitia dolorum vitae neque sed totam at nisi magnam necessitatibus eligendi.</p>
                        <a href="#" class="uk-button bl-btn-outline">Buy</a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="uk-grid" data-uk-switcher="{connect:'#services-list'}" data-bg-switcher>
            <li class="uk-width-1-4" data-bg="{{ asset('assets/frontend/img/bg-broadtv.jpg') }}">
                <button class="uk-button bl-button-image uk-button-large hover-to-click" data-target="#internet" data-toggle="tab">
                    <span>
                        <i class="pe-7s-global pe pe-va"></i>
                    </span>
                    BL - cares corner
                </button>
            </li>
            <li class="uk-width-1-4" data-bg="{{ asset('assets/frontend/img/bg-internet.jpg') }}">
                <button class="uk-button bl-button-image uk-button-large hover-to-click" data-target="#broadtel" data-toggle="tab">
                    <span>
                        <i class="pe-7s-call pe pe-va"></i>
                    </span>
                    Customer
                </button>
            </li>
            <li class="uk-width-1-4" data-bg="{{ asset('assets/frontend/img/bg-broadtel.jpg') }}">
                <button class="uk-button bl-button-image uk-button-large hover-to-click" data-target="#broadtv" data-toggle="tab">
                    <span>
                        <i class="pe-7s-display1 pe pe-va"></i>
                    </span>
                    Magna Aliquam
                </button>
            </li>
            <li class="uk-width-1-4" data-bg="{{ asset('assets/frontend/img/bg-bundle.jpg') }}">
                <button class="uk-button bl-button-image uk-button-large hover-to-click" data-target="#bundle" data-toggle="tab">
                    <span>
                        <i class="pe-7s-gift pe pe-va"></i>
                    </span>
                    News
                </button>
            </li>
        </ul>
    </div> --}}
</section>