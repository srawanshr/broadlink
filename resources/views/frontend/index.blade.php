@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Home')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
    <style>
        body:after{
            position:absolute; width:0; height:0; overflow:hidden; z-index:-1;
            content: url({{ asset('assets/frontend/img/bg-broadtv.jpg') }}) url({{ asset('assets/frontend/img/bg-internet.jpg') }}) url({{ asset('assets/frontend/img/bg-broadtel.jpg') }}) url({{ asset('assets/frontend/img/bg-bundle.jpg') }});
        }
    </style>
@stop

@section('body')
    @include('frontend.partials.slider')
    @include('frontend.partials.services')
    @include('frontend.partials.testimonials')
    @include('frontend.partials.news')
    @include('frontend.partials.clients')
@stop

@section('footer')
    <script type="text/javascript">
        $(document).on('ready', function () {

            $('#slider').mousemove(function (e) {
                $('.image1').parallax(-40, e);
                $('.image2').parallax(-30, e);
                $('.image3').parallax(-20, e);
                $('.subtitle').parallax(60, e);
            });

            $('ul[data-uk-switcher][data-bg-switcher]').on('show.uk.switcher', function(event, element){
                $('#news').css('background-image',"url('" + $(element).data('bg') +"')");
            });

            $(document).on('mouseover', '.hover-to-click', function() {
                $(this).trigger('click');
            });
        });
    </script>
@stop