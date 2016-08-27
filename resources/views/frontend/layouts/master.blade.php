<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {{ Html::style('assets/frontend/css/dep.css') }}
    {{ Html::style('assets/frontend/css/app.css') }}
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/plugins/toastr/toastr.css') }}" rel="stylesheet" type="text/css">
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