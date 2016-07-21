<script>
    $(function() {
        // crud table
        altair_crud_table.init();
    });

    altair_crud_table = {
        init: function() {

            $('#contact_crud').jtable({
                title: 'All Contacts',
                paging: true, //Enable paging
                pageSize: 10, //Set page size (default: 10)
                addRecordButton: $('#recordAdd'),
                deleteConfirmation: function(data) {
                    data.deleteConfirmMessage = 'Are you sure to delete contact ' + data.record.name + '?';
                },
                formCreated: function(event, data) {
                    // replace click event on some clickable elements
                    // to make icheck label works
                    data.form.find('.jtable-option-text-clickable').each(function() {
                        var $thisTarget = $(this).prev().attr('id');
                        $(this)
                            .attr('data-click-target',$thisTarget)
                            .off('click')
                            .on('click',function(e) {
                                e.preventDefault();
                                $('#'+$(this).attr('data-click-target')).iCheck('toggle');
                            })
                    });
                    // create selectize
                    data.form.find('select').each(function() {
                        var $this = $(this);
                        $this.after('<div class="selectize_fix"></div>')
                        .selectize({
                            dropdownParent: 'body',
                            placeholder: 'Click here to select ...',
                            onDropdownOpen: function($dropdown) {
                                $dropdown
                                    .hide()
                                    .velocity('slideDown', {
                                        begin: function() {
                                            $dropdown.css({'margin-top':'0'})
                                        },
                                        duration: 200,
                                        easing: easing_swiftOut
                                    })
                            },
                            onDropdownClose: function($dropdown) {
                                $dropdown
                                    .show()
                                    .velocity('slideUp', {
                                        complete: function() {
                                            $dropdown.css({'margin-top':''})
                                        },
                                        duration: 200,
                                        easing: easing_swiftOut
                                    })
                            }
                        });
                    });
                    // create icheck
                    data.form
                        .find('input[type="checkbox"],input[type="radio"]')
                        .each(function() {
                            var $this = $(this);
                            $this.iCheck({
                                checkboxClass: 'icheckbox_md',
                                radioClass: 'iradio_md',
                                increaseArea: '20%'
                            })
                            .on('ifChecked', function(event){
                                $this.parent('div.icheckbox_md').next('span').text('Active');
                            })
                            .on('ifUnchecked', function(event){
                                $this.parent('div.icheckbox_md').next('span').text('Passive');
                            })
                        });
                    // reinitialize inputs
                    data.form.find('.jtable-input').children('input[type="text"],input[type="password"],textarea').not('.md-input').each(function() {
                        $(this).addClass('md-input');
                        altair_forms.textarea_autosize();
                    });
                    altair_md.inputs();
                },
                actions: {
                    listAction: '{{ route('admin::contact.list') }}',
                    createAction: '{{ route('admin::contact.store') }}',
                    updateAction: '{{ route('admin::contact.update') }}',
                    deleteAction: '{{ route('admin::contact.destroy') }}',
                },
                fields: {
                    id: {
                        key: true,
                        create: false,
                        edit: false,
                        list: false,
                        visibility: 'hidden'
                    },
                    type: {
                        title: 'Type*',
                        type: 'select',
                        options: '{{ route('admin::contact.type.list') }}'
                    },
                    name: {
                        title: 'Name*'
                    },
                    address: {
                        title: 'Address*'
                    },
                    phone: {
                        title: 'Phone*'
                    },
                    email: {
                        title: 'Email',
                        type: 'email',
                        display: function(data) {
                            return data.record.email ? data.record.email : '-';
                        }
                    },
                    description: {
                        title: 'Description',
                        display: function(data) {
                            return data.record.description ? data.record.description : '-';
                        }
                    }
                }
            }).jtable('load');

            // change buttons visual style in ui-dialog
            $('.ui-dialog-buttonset')
                .children('button')
                .attr('class','')
                .addClass('md-btn md-btn-flat')
                .off('mouseenter focus');
            $('#AddRecordDialogSaveButton,#EditDialogSaveButton,#DeleteDialogButton').addClass('md-btn-flat-primary');
        }
    };
</script>