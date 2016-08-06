<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {{ Html::style('assets/frontend/css/dep.css') }}
    {{ Html::style('assets/frontend/css/app.css') }}
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    @yield('header')
</head>
<body>
    @include('frontend.layouts.header')
    @yield('body')
    @include('frontend.layouts.footer')
    {{ Html::script('assets/frontend/js/dep.js') }}
    @yield('footer')
    <script type="text/javascript">
        // $(document).on('mouseover', '.hover-to-click', function() {
        //     $(this).trigger('click');
        // });
        jQuery(function($) {
            $('.uk-tab-hover >li:not(.uk-tab-responsive, .uk-disabled)').hover(function () {
                $(this).trigger('click.uikit.tab');
            });
        });
    </script>
</body>
</html>