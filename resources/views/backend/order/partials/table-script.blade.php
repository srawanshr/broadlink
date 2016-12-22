<script>
    $(function () {
        // order datatable
        altair_datatables.dt_order();
    });

    altair_datatables = {
        dt_order: function () {
            var $dt_order = $('#dt_order');
            if ($dt_order.length) {

                // Setup - add a text input to each footer cell
                $dt_order.find('tfoot th').each(function () {
                    var title = $dt_order.find('tfoot th').eq($(this).index()).text();
                    $(this).html('<input type="text" class="md-input" placeholder="' + title + '" />');
                });

                // reinitialize md inputs
                altair_md.inputs();

                // DataTable
                var pin_table = $dt_order.DataTable({
                    ajax: {
                        type: 'POST',
                        url: $dt_order.data('source')
                    },
                    columns: [
                        {data: 'invoice_id'},
                        {data: 'name'},
                        {data: 'customer'},
                        {data: 'sno'},
                        {data: 'payment_method'},
                        {data: 'status', class: 'uk-text-center'},
                        {data: 'created_at', class: 'uk-text-center'},
                        {data: 'action', class: 'uk-text-center'}
                    ]
                });

                // Apply the search
                pin_table.columns().every(function () {
                    var that = this;

                    $('input', this.footer()).on('keyup change', function () {
                        that
                            .search(this.value)
                            .draw();
                    });
                });

                var tt = new $.fn.dataTable.TableTools(pin_table, {
                    "sSwfPath": window.sSwfPath
                });

                $(tt.fnContainer()).insertBefore($dt_order.closest('.dt-uikit').find('.dt-uikit-header'));

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