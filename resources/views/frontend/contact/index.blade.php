@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Contact Us')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
    @include('frontend.partials.banner', ['title' => 'Contact Us', 'images' => $page->banners])
    <section class="uk-block uk-block-default uk-block-large">
        <div class="uk-container uk-container-center">
            <div class="uk-grid">
                <div class="uk-width-medium-1-2">
                    {!! $page->content_html !!}
                </div>
                <div class="uk-width-medium-1-2">
                    <form class="form-email" class="uk-form" >
                        <input type="text" class="uk-form-large uk-width-1-1" name="name" placeholder="Your Name">
                        <input type="text" class="uk-form-large uk-width-1-1 validate-email" name="email" placeholder="Email Address">
                        <textarea class="uk-width-1-1" name="message" rows="8" placeholder="Message"></textarea>
                        <button type="submit" class="uk-button uk-button-success uk-width-1-1">Send Message</button>
                    </form>
                </div>
            </div>
            <!--end of row-->
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <!-- This is the container of the toggling elements -->
                    <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#branches'}">
                        @foreach( $contactTypes as $type)
                            <li><a href="javascript:void(0)">{{ strtoupper($type) }}</a></li>
                        @endforeach
                    </ul>

                    <!-- This is the container of the content items -->
                    <ul id="branches" class="uk-switcher">
                        @foreach( $contactTypes as $id => $type)
                            <li>
                                <div class="uk-grid uk-grid-match">
                                    @foreach( $contacts->get($id, []) as $contact)
                                        <div class="uk-width-medium-1-2">
                                            <div class="bl-card">
                                                <div class="bl-card-heading">
                                                    {{ $contact->name }}
                                                </div>
                                                <div class="bl-card-content">
                                                    <p>{{ $contact->address }},{{ $contact->phone }},{{ $contact->email }}</p>
                                                    <p>{{ $contact->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!--end of container-->
    </section>
@stop