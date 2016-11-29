@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Order')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
    {{ Html::style('assets/plugins/gmaps-picker/css/jquery-gmaps-latlon-picker.css') }}
    <style>
        .gllpMap {
            width: 100% !important;
        }
    </style>
@stop

@section('body')
    @include('frontend.partials.banner', ['title' => 'Order'])
    <section class="uk-block uk-margin-remove uk-padding-remove bl-text-dark">
        <div class="uk-container uk-container-center bl-margin-top-ve uk-block-default bl-card">
            <div class="bl-padding-2">
                {{ Form::open(['route'=>'service::order', 'class'=>'uk-form']) }}
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <div class="uk-form-row">
                            <label class="uk-form-label">Your Name</label>
                            <input type="text" class="uk-width-1-1" name="name" placeholder="John Doe" required value="{{ isset($formData) && array_key_exists('name', $formData) ? $formData['name']:'' }}">
                        </div>
                        <div class="uk-form-row">
                            <label class="uk-form-label">Your Email</label>
                            <input type="email" class="uk-width-1-1" name="email" placeholder="john@doe.com" required value="{{ isset($formData) && array_key_exists('email', $formData) ? $formData['email']:'' }}">
                        </div>
                        <div class="uk-form-row">
                            <label class="uk-form-label">Subject</label>
                            <input type="text" class="uk-width-1-1" name="subject" placeholder="Feedback" required value="{{ isset($formData) && array_key_exists('subject', $formData) ? $formData['subject']:'' }}">
                        </div>
                        <div class="uk-form-row">
                            <label class="uk-form-label">Phone</label>
                            <input type="text" class="uk-width-1-1" name="subject" placeholder="Phone" required value="{{ isset($formData) && array_key_exists('phone', $formData) ? $formData['phone']:'' }}">
                        </div>
                        <div class="uk-form-row">
                            <label class="uk-form-label">Message</label>
                            <textarea class="uk-width-1-1" name="message" rows="4" placeholder="Message" required>{{ isset($formData) && array_key_exists('message', $formData) ? $formData['message']:'' }}</textarea>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="gllpLatlonPicker" id="custom_id">
                            <input type="text" class="gllpSearchField" placeholder="Search Location">
                            <button type="button" class="gllpSearchButton uk-button uk-button-default uk-margin-bottom">
                                <i class="material-icons">&#xE8B6;</i>
                            </button>
                            <div class="gllpMap">Google Maps</div>
                            <input type="hidden" class="gllpLatitude" value="27.68108" name="latitude"/>
                            <input type="hidden" class="gllpLongitude" value="85.30170" name="longitude"/>
                            <input type="hidden" class="gllpZoom" value="12"/>
                        </div>
                        <p class="uk-text-muted">You can search for your location, drag the Marker or double click the map to let us know your location</p>
                    </div>
                    <div class="div width-1-1 uk-align-center">
                        <button type="submit" class="uk-button uk-button-success uk-float-right uk-button-large">
                            <i class="material-icons">&#xE163;</i>
                            Send Message
                        </button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@section('footer')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCw8YWCFSFe4plsU7xT8UUNehWwhnizUSM"></script>
    <script>
        $.gMapsLatLonPickerNoAutoInit = 1;
    </script>
    {{ Html::script('assets/plugins/gmaps-picker/js/jquery-gmaps-latlon-picker.js') }}

    <script>
        $(document).ready(function() {
            // Copy the init code from "jquery-gmaps-latlon-picker.js" and extend it here
            $(".gllpLatlonPicker").each(function() {
                $obj = $(document).gMapsLatLonPicker();

                $obj.params.strings.markerText = "Drag this Marker or Double click the location";

                $obj.params.displayError = function(message) {
                    console.log("MAPS ERROR: " + message); // instead of alert()
                };

                $obj.init( $(this) );
            });
        });
    </script>
@stop