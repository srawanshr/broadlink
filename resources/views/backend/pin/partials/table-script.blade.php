<script>
    $(function () {
        // pin datatable
        altair_datatables.dt_pin();
    });

    altair_datatables = {
        dt_pin: function () {
            var $dt_pin = $('#dt_pin');
            if ($dt_pin.length) {

                // Setup - add a text input to each footer cell
                $dt_pin.find('tfoot th').each(function () {
                    var title = $dt_pin.find('tfoot th').eq($(this).index()).text();
                    $(this).html('<input type="text" class="md-input" placeholder="' + title + '" />');
                });

                // reinitialize md inputs
                altair_md.inputs();

                // DataTable
                var pin_table = $dt_pin.DataTable({
                    ajax: {
                        type: 'POST',
                        url: '{!! route('admin::pin.list') !!}'
                    },
                    columns: [
                        {data: 'sno'},
                        {data: 'pin'},
                        {data: 'voucher'},
                        {
                            data: 'is_used',
                            render: function (data) {
                                return data == 0 ? 'No' : 'Yes'
                            }
                        },
                        {data: 'action', searchable: false, orderable: false, class: 'text-right'}
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

                $(tt.fnContainer()).insertBefore($dt_pin.closest('.dt-uikit').find('.dt-uikit-header'));

                $body.on('click', function (e) {
                    if ($body.hasClass('DTTT_Print')) {
                        if (!$(e.target).closest(".DTTT").length && !$(e.target).closest(".uk-table").length) {
                            var esc = $.Event("keydown", {keyCode: 27});
                            $body.trigger(esc);
                        }
                    }
                })
            }
        },
    };
</script>