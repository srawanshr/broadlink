<!doctype html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">

    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/backend/img/favicon-16x16.png') }}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{ asset('assets/backend/img/favicon-32x32.png') }}" sizes="32x32">

    {{ Html::style('assets/frontend/css/dep.css') }}
    {{ Html::style('assets/frontend/css/app.css') }}

    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/plugins/toastr/toastr.css') }}" rel="stylesheet" type="text/css">

    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
    <script type="text/javascript" src="{{ asset('assets/plugins/matchMedia/matchMedia.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/matchMedia/matchMedia.addListener.js') }}"></script>
    <![endif]-->
    
    @yield('header')
</head>
<body>
    @include('frontend.layouts.header')
    @yield('body')
    @include('frontend.layouts.footer')
    {{ Html::script('assets/frontend/js/dep.js') }}
    <script src="{{ asset('assets/plugins/toastr/toastr.js') }}"></script>
    <script>
        $(document).ready(function () {
            //Session messages
            var successMsg = "{{ session('success') }}";
            var infoMsg = "{{ session('info') }}";
            var warningMsg = "{{ session('warning') }}";
            var dangerMsg = "{{ session('danger') }}";
            var statusMsg = "{{ session('status') }}";

            toastr.options = {
                closeButton: true,
                progressBar: false,
                debug: false,
                positionClass: 'toast-bottom-right',
                showDuration: 330,
                hideDuration: 330,
                timeOut: 5000,
                extendedTimeOut: 1000,
                showEasing: 'swing',
                hideEasing: 'swing',
                showMethod: 'slideDown',
                hideMethod: 'slideUp'
            };

            if(successMsg) { toastr.success(successMsg, ''); }

            if(statusMsg) { toastr.success(statusMsg, ''); }

            if(infoMsg) { toastr.info(infoMsg, ''); }

            if(warningMsg) { toastr.warning(warningMsg, ''); }

            if(dangerMsg) { toastr.error(dangerMsg, ''); }
        });
    </script>
    @yield('footer')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.ajax-modal').on('click', function(){
                var url = $(this).data('url');
                var loading = UIkit.modal.blockUI("Loading..."); // modal.hide() to unblock
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        var closebtn = "<a class='uk-modal-close uk-close' style='float:right'></a>";
                        loading.hide();
                        UIkit.modal.blockUI(closebtn+response);
                    }
                });
            });
        });
    </script>
</body>
</html>