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
    <div class="uk-container uk-container-center bl-padding-2-tb bl-text-light">
    	<div class="uk-margin" data-uk-slideset="{animation: 'scale', medium:4, small:3}">
	        <div class="uk-slidenav-position uk-margin">
	            <ul class="uk-slideset uk-grid uk-flex-center">
	            	@foreach(tags()->pluck('posts')->flatten()->unique('id') as $post)
	                	<li data-uk-filter="{{ $post->tags->implode('tag', ',') }}">
                            <img src="{{ $post->image ? asset($post->image->thumbnail(300,200)) : asset(config('paths.placeholder.post')) }}" width="300" height="200" alt="{{ $post->title }}" class="uk-thumbnail">
                            <h4>{{ str_limit($post->title, 50) }}</h4>
                            <p class="uk-hidden-small">{{ str_limit(strip_tags($post->content_html), 100)}}</p>
                            <a href="{{ route('post::show', $post->slug) }}" class="bl-btn-outline">Read More</a>
                        </li>
	                @endforeach
	            </ul>
	            <a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
	            <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
	        </div>
	        <ul class="uk-slideset-nav uk-dotnav uk-flex-center"></ul>
	        <div class="uk-tab-center uk-hidden-small">
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
</section>