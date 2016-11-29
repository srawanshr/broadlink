<script>
    $(function () {
        // customer datatable
        altair_datatables.dt_customer();
    });

    altair_datatables = {
        dt_customer: function () {
            var $dt_customer = $('#dt_customer');
            if ($dt_customer.length) {

                // Setup - add a text input to each footer cell
                $dt_customer.find('tfoot th').each(function () {
                    var title = $dt_customer.find('tfoot th').eq($(this).index()).text();
                    $(this).html('<input type="text" class="md-input" placeholder="' + title + '" />');
                });

                // reinitialize md inputs
                altair_md.inputs();

                // DataTable
                var customer_table = $dt_customer.DataTable({
                    ajax: {
                        type: 'POST',
                        url: $('#dt_customer').data('source')
                    },
                    columns: [
                        {'data': 'display_name', 'class': 'uk-text-nowrap uk-text-left'},
                        {'data': 'address', 'class': 'uk-text-nowrap uk-text-center'},
                        {'data': 'phone', 'class': 'uk-text-nowrap uk-text-center'},
                        {'data': 'email', 'class': 'uk-text-nowrap uk-text-center'}
                    ]
                });

                var tt = new $.fn.dataTable.TableTools(customer_table, {
                    "sSwfPath": window.sSwfPath
                });

                $(tt.fnContainer()).insertBefore($dt_customer.closest('.dt-uikit').find('.dt-uikit-header'));

                $body.on('click', function (e) {
                    if ($body.hasClass('DTTT_Print')) {
                        if (!$(e.target).closest(".DTTT").length && !$(e.target).closest(".uk-table").length) {
                            var esc = $.Event("keydown", {keyCode: 27});
                            $body.trigger(esc);
                        }
                    }
                })
            }
        }
    };
</script>