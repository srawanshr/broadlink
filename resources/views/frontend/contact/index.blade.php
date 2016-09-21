@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Contact Us')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
    <style>
        #map {
            width: 100%;
            height: 400px;
        }
    </style>
@stop

@section('body')
    @include('frontend.partials.banner', ['title' => 'Contact Us', 'images' => $page->banners])
    <section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark">
        <div class="uk-container uk-container-center bl-margin-top-ve uk-block-default bl-card">
            <div class="bl-padding-2">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <div id="map"></div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <p>Corporate Office</p>
                        <hr>
                        <p>{{ $settings['name'] }}</p>
                        <p>{!! str_replace('|', '<br>', $settings['address']) !!}</p>
                        <p>GPO: {!! $settings['gpo'] !!}</p>
                        <p>Phone: {!! $settings['phone'] !!}</p>
                        <p>Fax: {!! $settings['fax'] !!}</p>
                        <p>Email: {!! $settings['email'] !!}</p>
                    </div>
                </div>

                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        {!! $page->content_html !!}
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-panel uk-panel-box">
                            {{ Form::open(['route'=>'contact::feedback', 'class'=>'uk-form']) }}
                                <div class="uk-form-row">
                                    <label class="uk-form-label">Your Name</label>
                                    <input type="text" class="uk-width-1-1" name="name" placeholder="John Doe" required>
                                </div>
                                <div class="uk-form-row">
                                    <label class="uk-form-label">Your Email</label>
                                    <input type="email" class="uk-width-1-1" name="email" placeholder="john@doe.com" required>
                                </div>
                                <div class="uk-form-row">
                                    <label class="uk-form-label">Subject</label>
                                    <input type="text" class="uk-width-1-1" name="subject" placeholder="Feedback" required>
                                </div>
                                <div class="uk-form-row">
                                    <label class="uk-form-label">Message</label>
                                    <textarea class="uk-width-1-1" name="message" rows="4" placeholder="Message" required></textarea>
                                </div>
                                <button type="submit" class="uk-button uk-button-success uk-float-right">Send Message</button>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <!--end of row-->
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <!-- This is the container of the toggling elements -->
                        <ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#branches'}">
                            @foreach( $contactTypes as $type)
                                <li><a href="javascript:void(0)" class="uk-button-large">{{ strtoupper($type) }}</a>
                                </li>
                            @endforeach
                        </ul>

                        <!-- This is the container of the content items -->
                        <ul id="branches" class="uk-switcher">
                            @foreach( $contactTypes as $id => $type)
                                <li>
                                    @foreach( collect($contacts->get($id, []))->chunk(2) as $chunk)
                                        <div class="uk-grid">
                                            @foreach($chunk as $contact)
                                                <div class="uk-width-medium-1-2">
                                                    <div class="uk-panel uk-panel-box uk-panel-header">
                                                        <h3 class="uk-panel-title">{{ $contact->name }}</h3>
                                                        <div id="contact-{{ $contact->id }}">
                                                            <p>{{ empty($contact->address) ? '': 'Address: '.$contact->address }}</p>
                                                            <p>{{ empty($contact->phone) ? '': 'Phone: '.$contact->phone }}</p>
                                                            <p>{{ empty($contact->email) ? '': 'Email: '.$contact->email }}</p>
                                                            <p>{{ empty($contact->description) ? '': 'Note: '.$contact->description }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
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

@section('footer')
    <script>
        function initMap() {
            var mapDiv = document.getElementById('map');
            var map = new google.maps.Map(mapDiv, {
                center: {lat: 27.68108, lng: 85.30170},
                zoom: 17
            });
        }
    </script>
    <script async
            defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCw8YWCFSFe4plsU7xT8UUNehWwhnizUSM&callback=initMap">
    </script>
@stop