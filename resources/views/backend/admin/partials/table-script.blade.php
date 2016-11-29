<script>
    $(function() {
        // crud table
        altair_crud_table.init();
    });

    altair_crud_table = {
        init: function() {

            $('#admin_crud').jtable({
                title: 'All Users',
                paging: true, //Enable paging
                pageSize: 10, //Set page size (default: 10)
                addRecordButton: $('#recordAdd'),
                deleteConfirmation: function(data) {
                    data.deleteConfirmMessage = 'Are you sure to delete user ' + data.record.username + '?';
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
                    listAction: '{{ route('admin::user.list') }}',
                    createAction: '{{ route('admin::user.store') }}',
                    updateAction: '{{ route('admin::user.update') }}',
                    deleteAction: '{{ route('admin::user.destroy') }}',
                },
                fields: {
                    id: {
                        key: true,
                        create: false,
                        edit: false,
                        list: false,
                        visibility: 'hidden'
                    },
                    first_name: {
                        title: 'First Name*'
                    },
                    last_name: {
                        title: 'Last Name*'
                    },
                    address: {
                        title: 'Address',
                        display: function(data) {
                            return data.record.address ? data.record.address : '-';
                        }
                    },
                    phone: {
                        title: 'Phone',
                        display: function(data) {
                            return data.record.phone ? data.record.phone  : '-';
                        }
                    },
                    username: {
                        title: 'Username*'
                    },
                    email: {
                        title: 'Email*',
                        type: 'email'
                    },
                    password: {
                        title: 'Password*',
                        type: 'password',
                        edit: false,
                        list: false
                    },
                    password_confirmation: {
                        title: 'Password Confirmation*',
                        type: 'password',
                        edit: false,
                        list: false
                    },
                    is_active: {
                        title: 'Status*',
                        create: false,
                        edit: true,
                        type: 'checkbox',
                        values: { 'false': 'Passive', 'true': 'Active' },
                        defaultValue: 'true'
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