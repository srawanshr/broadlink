<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="{{ config('website.author') }}">
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        @yield('og-description')

        <title>{{ config('website.title') }} @yield('title')</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('assets/backend/img/favicon-16x16.png') }}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{ asset('assets/backend/img/favicon-32x32.png') }}" sizes="32x32">
        
        <!-- additional styles for plugins -->
        @stack('styles')

        <!-- uikit -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/uikit/css/uikit.almost-flat.min.css') }}" media="all">

        <!-- altair admin -->
        <link rel="stylesheet" href="{{ asset('assets/backend/css/main.min.css') }}" media="all">

        <!-- my theme -->
        <link rel="stylesheet" href="{{ asset('assets/backend/css/my_theme.min.css') }}" media="all">

        <!-- matchMedia polyfill for testing media queries in JS -->
        <!--[if lte IE 9]>
            <script type="text/javascript" src="{{ asset('assets/plugins/matchMedia/matchMedia.js') }}"></script>
            <script type="text/javascript" src="{{ asset('assets/plugins/matchMedia/matchMedia.addListener.js') }}"></script>
        <![endif]-->

    </head>
    <body class="sidebar_main_open sidebar_main_swipe">
        @if (Auth::guard('admin')->guest())

            @yield('login')

        @else

            <!-- BEGIN HEADER -->
            @include('backend.partials.header')
            <!-- END HEADER -->

            <!-- BEGIN SIDEBAR -->
            @include('backend.partials.sidebar')
            <!-- END SIDEBAR -->

            @yield('content')

        @endif
        <!-- BEGIN CORE SCRIPTS -->
        <!-- google web fonts -->
        <script>
            var sSwfPath = "/assets/plugins/datatables-tabletools/swf/copy_csv_xls_pdf.swf";
            WebFontConfig = {
                google: {
                    families: [
                        'Source+Code+Pro:400,700:latin',
                        'Roboto:400,300,500,700,400italic:latin'
                    ]
                }
            };
            (function() {
                var wf = document.createElement('script');
                wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
                wf.type = 'text/javascript';
                wf.async = 'true';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(wf, s);
            })();
        </script>

        <!-- common functions -->
        <script src="{{ asset('assets/backend/js/common.min.js') }}"></script>

        <!-- uikit functions -->
        <script src="{{ asset('assets/backend/js/uikit_custom.min.js') }}"></script>
        
        <!-- altair common functions/helpers -->
        <script src="{{ asset('assets/backend/js/altair_admin_common.min.js') }}"></script>
        <!-- END CORE SCRIPTS -->

        @include('backend.partials.script')

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        @stack('scripts')
        <!-- END PAGE LEVEL SCRIPTS -->

        <script>
            $(function() {
                //enable hires images
                altair_helpers.retina_images();
                // fastClick (touch devices)
                if(Modernizr.touch) {
                    FastClick.attach(document.body);
                }
            });
        </script>
    </body>
</html>