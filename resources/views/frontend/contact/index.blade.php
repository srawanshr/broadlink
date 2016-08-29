@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Contact Us')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
@stop

@section('body')
    @include('frontend.partials.banner', ['title' => 'Contact Us', 'images' => $page->banners])
    <section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark">
        <div class="uk-container uk-container-center bl-margin-top-ve uk-block-default bl-card">
            <div class="bl-padding-2">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <div class="uk-grid">
                            <div class="uk-grid-1-1">
                                {!! $page->content_html !!}
                            </div>
                            <div class="uk-grid-1-1">
                                <h2>Corporate Office</h2>
                                <h1>{{ $settings['name'] }}</h1>
                                <p>{!! str_replace('|', '<br>', $settings['address']) !!}</p>
                                <p>GPO: {!! $settings['gpo'] !!}</p>
                                <p>Phone: {!! $settings['phone'] !!}</p>
                                <p>Fax: {!! $settings['fax'] !!}</p>
                                <p>Email: {!! $settings['email'] !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-panel uk-panel-box">
                            @include('frontend.partials.contactform')
                        </div>
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
                                    <div class="uk-grid">
                                        @foreach( $contacts->get($id, []) as $contact)
                                            <div class="uk-width-medium-1-2">
                                                <div class="uk-panel uk-panel-box uk-panel-header">
                                                    <h3 class="uk-panel-title">{{ $contact->name }}</h3>
                                                    <div id="contact-{{ $contact->id }}">
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
        </div>
        <!--end of container-->
    </section>
@stop