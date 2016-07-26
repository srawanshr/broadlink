@extends('frontend.layouts.master')

@section('title', 'Broadlink :: Home')

@section('header')
    {{ Html::style('assets/frontend/css/style.css')}}
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
                $('#our-services').css('background',"url('" + $(element).data('bg') +"')");
            });

            $(document).on('mouseover', '.hover-to-click', function() {
                $(this).trigger('click');
            });

            //center align slider images
            // $(window).on('load resize', function(){
            //     $images = $('.image');
            //     var heignt = $images.height();
            //     $images.css('margin-top','-'+(height/2)+'px');

            // });
        });
    </script>
@stop