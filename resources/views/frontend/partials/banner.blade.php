<section class="banner height-4 text-center uk-position-relative bl-text-light uk-cover" data-uk-parallax="{y: '200'}">
    <ul class="uk-slideshow" data-uk-slideshow="{autoplay:true, animation:'scale', height: '400px'}">
        @if(isset($images))
            @forelse($images as $image)
                <li>
                    <img src="{{ asset($image->path) }}">
                </li>
            @empty
                <li>
                    <img src="{{ asset('assets/frontend/img/bg-service.jpg') }}">
                </li>
            @endforelse
        @else
            <li>
                <img src="{{ asset('assets/frontend/img/bg-service.jpg') }}">
            </li>
        @endif
    </ul>
    <h1 class="uk-position-cover uk-flex uk-flex-middle uk-flex-center">{{ strtoupper($title) }}</h1>
</section>
