@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Contact Us')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
    @include('frontend.partials.banner', ['title' => 'Contact Us', 'images' => $page->banners])
    <section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark">
        <div class="uk-container uk-container-center bl-margin-top-ve uk-block-default bl-padding-2-tb bl-card">
            <div class="uk-grid">
                <div class="uk-width-medium-1-2">
                    <div class="uk-grid">
                        <div class="uk-grid-1-1">
                            {!! $page->content_html !!}
                        </div>
                        <div class="uk-grid-1-1">
                            <div class="uk-panel uk-panel-box">
                                <p>{!! str_replace('|', '<br>', $settings['address']) !!}</p>
                                <p>GPO: {!! $settings['gpo'] !!}</p>
                                <p>Phone: {!! $settings['phone'] !!}</p>
                                <p>Fax: {!! $settings['fax'] !!}</p>
                                <p>Email: {!! $settings['email'] !!}</p>
                            </div>
                        </div>
                    </div>
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
                            <li><a href="javascript:void(0)" class="uk-button-large">{{ strtoupper($type) }}</a></li>
                        @endforeach
                    </ul>

                    <!-- This is the container of the content items -->
                    <ul id="branches" class="uk-switcher">
                        @foreach( $contactTypes as $id => $type)
                            <li>
                                <div class="uk-grid uk-grid-match">
                                    @foreach( $contacts->get($id, []) as $contact)
                                        <div class="uk-width-medium-1-2">
                                            <hr class="uk-article-divider">
                                            <h3>{{ $contact->name }}</h3>
                                            <div>
                                                <p>{{ $contact->address }},{{ $contact->phone }},{{ $contact->email }}</p>
                                                <p>{{ $contact->description }}</p>
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