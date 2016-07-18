<script>
    function setActiveLink() {
        var requestUrl = "{{ Request::url() }}";
        var $activeLink = $("#sidebar_main a[href='" + requestUrl + "']");

        $activeLink.closest('li').addClass('current_section');

        if($activeLink.closest('li').closest('ul').closest('li').length) {
            $activeLink.closest('li')
                .addClass('act_item')
                .closest('ul')
                .css('display', 'block')
                .closest('li')
                .addClass('act_section current_section');
        }
    }

    function showNotify(status, message) {
        thisNotify = UIkit.notify({
            message: message,
            status: status,
            timeout: 5000,
            group: status,
            pos: 'top-right',
            onClose: function() {
                $body.find('.md-fab-wrapper').css('margin-bottom','');
            }
        });
        if(
            (
                ($window.width() < 768)
                && (
                    (thisNotify.options.pos == 'bottom-right')
                    || (thisNotify.options.pos == 'bottom-left')
                    || (thisNotify.options.pos == 'bottom-center')
                )
            )
            || (thisNotify.options.pos == 'bottom-right')
        ) {
            var thisNotify_height = $(thisNotify.element).outerHeight();
            var spacer = $window.width() < 768 ? -6 : 8;
            $body.find('.md-fab-wrapper').css('margin-bottom',thisNotify_height + spacer);
        }
    }

    $(function() {
        // notifications
        altair_notifications.init();
    });

    altair_notifications = {
        init: function() {
            //Session messages
            var successMsg = "{{ session('success') }}";
            var infoMsg = "{{ session('info') }}";
            var warningMsg = "{{ session('warning') }}";
            var dangerMsg = "{{ session('danger') }}";

            if(successMsg) { showNotify('success', successMsg); }
            if(infoMsg) { showNotify('info', infoMsg); }
            if(warningMsg) { showNotify('warning', warningMsg); }
            if(dangerMsg) { showNotify('danger', dangerMsg); }
            
            setActiveLink();

        }
    };
</script>