<section id="clients" class="uk-block uk-text-center">
    <h1 class="uk-text-center">We are connected to</h1>
    <div class="uk-container uk-container-center" data-uk-scrollspy="{cls:'uk-animation-fade uk-invisible', target:'.tile', delay:300, topoffset:-50}">
        @foreach(clients() as $client)
            <div class="tile uk-invisible uk-vertical-align uk-text-center"><a href="{{ empty($client->website) ? '#' : $client->website }}" title="{{ $client->name }}">
            	<img src="{{ asset($client->image->path) }}" class="uk-responsive-width uk-vertical-align-middle"></a>
    		</div>
        @endforeach
    </div>
</section>