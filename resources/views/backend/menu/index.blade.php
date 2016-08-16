@extends('backend.layout')

@section('title', 'Menu')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/kendo-ui-core/styles/kendo.common-material.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/plugins//kendo-ui-core/styles/kendo.material.min.css') }}"/>
    <style type="text/css">
        .editable {
            background: transparent;
            border: 0;
            color: #684444;
            font-size: 15px;
        }
        .uk-accordion-content {
            background-color: rgba(200,200,200,0.05);
            border: 1px solid rgba(200,200,200,0.3);
        }
        .bl-accordion-item {
            margin-bottom: 5px;
        }
        h3.uk-accordion-title {
            margin: 0;
        }
        .button-menu-select {
            margin: 10px 0;
        }
        .bl-remove-accordion {
            margin: 0 10px !important;
        }
    </style>
@endpush

@section('content')
    {{ Form::open(['route' => 'admin::menu.update', 'files' => true, 'method' => 'put']) }}
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">Menu</h3>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-5">
                    <button class="md-btn md-btn-primary button-menu-select primary-menu" data-add-target="#primary-menu-list" type="button">Add</button>
                </div>
                <div class="uk-width-medium-4-5">
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-accordion">
                                <div class="bl-accordion-item">
                                    <h3 class="uk-accordion-title">Home</h3>
                                    <div class="uk-accordion-content" style="display: none">
                                        Home Link (Fixed)
                                    </div>
                                </div>
                                <div class="bl-accordion-item">
                                    <h3 class="uk-accordion-title">Service</h3>
                                    <div class="uk-accordion-content" style="display: none">
                                        Services (Fixed)
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="uk-accordion uk-sortable" data-uk-sortable id="primary-menu-list">
                            </div>
                            <hr>
                            <div class="uk-accordion">
                                <div class="bl-accordion-item">
                                    <h3 class="uk-accordion-title">User</h3>
                                    <div class="uk-accordion-content" style="display: none">
                                        Log In/Out
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="md-fab-wrapper">
        <button class="md-fab md-fab-accent" type="submit" id="menuSave" data-uk-tooltip="{pos:'left'}" title="Save Menu">
            <i class="material-icons md-color-white">&#xE161;</i>
        </button>
    </div>
    {{ Form::close() }}
    <div class="uk-modal" id="modal-add-menu">
        <div class="uk-modal-dialog">
            <button type="button" class="uk-modal-close uk-close"></button>
            <p>Please select the type of menu you want to add</p>
            <div class="uk-accordion" data-uk-accordion="{ collapse: true }">
                <div class="menu-item">
                    <h3 class="uk-accordion-title">Pages</h3>
                    <div class="uk-accordion-content" data-id="acc-page">
                        <div class="uk-grid data-uk-grid-margin">
                            <div class="uk-width-1-2">
                                <div class="uk-form-stacked">
                                    <label class="uk-form-label">Pages</label>
                                    {{ Form::select('menu-url', $pages, null, ['class' => 'menu-url', 'kendo-combo-box']) }}
                                </div>
                            </div>
                            <div class="uk-width-1-2">
                                <div class="uk-form-stacked">
                                    <label class="uk-form-label">Title</label>
                                    <input type="text" class="md-input label-fixed" name="menu-title">
                                </div>
                            </div>
                        </div>
                        <div class="uk-grid data-uk-grid-margin">
                            <div class="uk-width-1-2">
                                <div class="uk-form-stacked">
                                    <label class="uk-form-label">Icon</label>
                                    <input class='menu-icon' kendo-combo-box-icon name="menu-icon">
                                </div>
                            </div>
                            <div class="uk-width-1-2 menu-type-col">
                                <div class="uk-form-stacked">
                                    <label class="uk-form-label">Menu Type</label>
                                    {{ Form::select('menu-type', $menuTypes, 0, ['class' => 'menu-type', 'kendo-combo-box']) }}
                                </div>
                            </div>
                        </div>
                        <div class="uk-grid data-uk-grid-margin">
                            <div class="uk-width-1-1">
                                <button type="button" class="uk-button uk-button-primary uk-float-right button-menu-add"><i class="material-icons">&#xE145;</i> Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-item">
                    <h3 class="uk-accordion-title">Custom</h3>
                    <div class="uk-accordion-content" data-id="acc-custom">
                        <div class="uk-grid uk-grid-margin">
                            <div class="uk-width-1-2">
                                <div class="uk-form-stacked">
                                    <label class="uk-form-label">Title</label>
                                    <input type="text" class="md-input menu-title" name="menu-title">
                                </div>
                            </div>
                            <div class="uk-width-1-2">
                                <div class="uk-form-stacked">
                                    <label class="uk-form-label">URL</label>
                                    <input type="text" class="md-input menu-url" name="menu-url">
                                </div>
                            </div>
                        </div>
                        <div class="uk-grid uk-grid-margin">
                            <div class="uk-width-1-2 menu-type-col">
                                <div class="uk-form-stacked">
                                    <label class="uk-form-label">Menu Type</label>
                                    {{ Form::select('menu-type', $menuTypes, null, ['class' => 'menu-type', 'kendo-combo-box']) }}
                                </div>
                            </div>
                            <div class="uk-width-1-2">
                                <div class="uk-form-stacked">
                                    <label class="uk-form-label">Icon</label>
                                    <input class='menu-icon' kendo-combo-box-icon name="menu-icon">
                                </div>
                            </div>
                        </div>
                        <div class="uk-grid uk-grid-margin">
                            <div class="uk-width-1-1">
                                <button type="button" class="uk-button uk-button-primary uk-float-right button-menu-add"><i class="material-icons">&#xE145;</i> Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/js/pages/forms_file_input.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/backend/js/kendoui.custom.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/pages/kendoui.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        String.prototype.replaceAll = function(search, replacement) {
            var target = this;
            return target.replace(new RegExp(search, 'g'), replacement);
        };
        var $primaryMenu = $('#primary-menu-list');

        var existingMenus = {!! json_encode($primaryMenus) !!};

        var menuTemplate = {
            0: `<div class="bl-accordion-item">
                    <h3 class="uk-accordion-title">
                        <input type="hidden" value="{type}" name="{target}[{id}][type]">
                        <input type="text" value="{title}" name="{target}[{id}][name]" class="editable">
                        <a href="javascript:void(0)" class="uk-float-right">
                            <i class="material-icons">&#xE25D;</i>
                        </a>
                        <span class="uk-close uk-float-right bl-remove-accordion"></span>
                    </h3>
                    <div class="uk-accordion-content" style="display: none;">
                        <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <div class="uk-form-stacked">
                                    <label>URL</label>
                                    <input type="text" value="{url}" class="md-input" name="{target}[{id}][url]">
                                </div>
                            </div>
                            <div class="uk-width-1-2">
                                <div class="uk-form-stacked">
                                    <label class="uk-form-label">Icon</label>
                                    <input kendo-combo-box-icon name="{target}[{id}][icon]" value="{icon}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`,
            1: `<div class="bl-accordion-item">
                    <h3 class="uk-accordion-title">
                        <input type="hidden" value="{type}" name="{target}[{id}][type]">
                        <input type="text" value="{title}" name="{target}[{id}][name]" class="editable">
                        <a href="javascript:void(0)" class="uk-float-right">
                            <i class="material-icons">&#xE25D;</i>
                        </a>
                        <span class="uk-close uk-float-right bl-remove-accordion"></span>
                    </h3>
                    <div class="uk-accordion-content" style="display: none;">
                        <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <div class="uk-form-stacked">
                                    <label>URL</label>
                                    <input type="text" value="{url}" class="md-input" name="{target}[{id}][url]">
                                </div>
                            </div>
                            <div class="uk-width-1-2">
                                <div class="uk-form-stacked">
                                    <label class="uk-form-label">Icon</label>
                                    <input kendo-combo-box-icon name="{target}[{id}][icon]" value="{icon}">
                                </div>
                            </div>
                            <div class="uk-width-1-1">
                                <label>Child Menu</label>
                                <div class="uk-accordion uk-sortable" data-uk-sortable id="dropdown-menu-list-{id}">
                                </div>
                            </div>
                            <div class="uk-width-1-1">
                                <button class="md-btn md-btn-primary button-menu-select" type="button" data-add-target="#dropdown-menu-list-{id}">Add</button>
                            </div>
                        </div>
                    </div>
                </div>`,
            2: `<div class="bl-accordion-item">
                    <h3 class="uk-accordion-title">
                        <input type="hidden" value="{type}" name="{target}[{id}][type]">
                        <input type="text" value="{title}" name="{target}[{id}][name]" class="editable">
                        <a href="javascript:void(0)" class="uk-float-right"><i class="material-icons">&#xE25D;</i></a>
                        <span class="uk-close uk-float-right bl-remove-accordion"></span>
                    </h3>
                    <div class="uk-accordion-content" style="display: none;">
                        <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <div class="uk-form-stacked">
                                            <label>URL</label>
                                            <input type="text" value="{url}" class="md-input" name="{target}[{id}][url]">
                                        </div>
                                    </div>
                                    <div class="uk-width-1-1">
                                        <div class="uk-form-stacked">
                                            <label class="uk-form-label">Icon</label>
                                            <input kendo-combo-box-icon name="{target}[{id}][icon]" value="{icon}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-1-2">
                                <label>Image</label>
                                <div class="uk-grid">
                                    <div class="uk-width-1-2">
                                        <div class="uk-form-stacked">
                                            <div id="file_upload-drop" class="uk-file-upload">
                                                <p class="uk-text">Drop file to upload</p>
                                                <p class="uk-text-muted uk-text-small uk-margin-small-bottom">or</p>
                                                <a class="uk-form-file md-btn">choose file<input class="icon-input" type="file" name="{target}[{id}][image]" data-id="{id}"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-2">
                                        <img src="" id="icon-{id}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <div class="uk-form-stacked">
                                    <label>Child Menu</label>
                                    <div class="uk-accordion uk-sortable" data-uk-sortable id="dropdown-menu-list-{id}">
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-1-1">
                                <button class="md-btn md-btn-primary button-menu-select" type="button" data-add-target="#dropdown-menu-list-{id}">Add</button>
                            </div>
                        </div>
                    </div>
                </div>`
        }
        var menuListAccordion = {}, modalList = {},  menuListSortable = {};

        $.each(existingMenus, function(k,v) {
            var menuTemplateClone = menuTemplate[v.type]
                .replaceAll('{title}', v.name)
                .replaceAll('{url}', v.url)
                .replaceAll('{icon}', v.icon)
                .replaceAll('{target}', $primaryMenu.attr('id'))
                .replaceAll('{id}', v.id)
                .replaceAll('{type}', v.type);
            $primaryMenu.append(menuTemplateClone);
            refreshAccordion('#'+$primaryMenu.attr('id'));
            if(v.sub_menus.length > 0) {
                $.each(v.sub_menus, function(sk,sv) {
                    var $currentMenu = $('#dropdown-menu-list-'+v.id);
                    var menuTemplateClone = menuTemplate[0]
                        .replaceAll('{title}', sv.name)
                        .replaceAll('{url}', sv.url)
                        .replaceAll('{icon}', sv.icon)
                        .replaceAll('{target}', $currentMenu.attr('id'))
                        .replaceAll('{id}', sv.id)
                        .replaceAll('{type}', 0);
                    $currentMenu.append(menuTemplateClone);
                    refreshAccordion('#'+$currentMenu.attr('id'));
                });
            }
            if(!(v.image === null))
                $('#icon-'+v.id).attr('src', '{{ url("/") }}'+v.image.path);
        });

        $(document).on('click', '.button-menu-select', function(){
            console.log('addoing button');
            modal = '#modal-add-menu';
            if($(this).hasClass('primary-menu'))
                $('.menu-type-col').show();
            else
                $('.menu-type-col').hide();

           $(modal).find('button').data('add-target',$(this).data('add-target'));
           toggleModal(modal);
        });

        $(document).on('click', '.button-menu-add', function() {
            $menuitem = $(this).closest('.menu-item');

            var title = $menuitem.find('[name=menu-title]').val();
            var url = $menuitem.find('[name=menu-url]').val();
            var type = $menuitem.find('[name=menu-type]').val();
            var icon = $menuitem.find('[name=menu-icon]').val();
            var target = $(this).data('add-target');
            var id = makeid();
            var $menuList = $(target);

            if(type===undefined) type=0;

            var menuTemplateClone = menuTemplate[type]
                .replaceAll('{title}', title)
                .replaceAll('{url}', url)
                .replaceAll('{icon}', icon)
                .replaceAll('{target}', target.substring(1))
                .replaceAll('{id}', id)
                .replaceAll('{type}', type);
            
            $menuList.append(menuTemplateClone);

            refreshAccordion(target);

            refreshComboBox();

            // $modal.hide(); 
        });

        refreshComboBox();

        $(document).on('click', '.bl-remove-accordion', function() {
            $(this).closest('.bl-accordion-item').detach();
        });

        //image thumbnail

         var readURL = function(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#icon-'+$(input).data('id')).attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        };

        $(document).on('change', ".icon-input", function(){
            readURL(this);
        });

        function refreshComboBox() {
            $('[kendo-combo-box]').each(function() {
                $(this).kendoComboBox();
            });
            $('[kendo-combo-box-icon]').each(function() {
                $(this).kendoComboBox({
                    dataTextField: "name",
                    dataValueField: "code",
                    template: '<span class="k-state-default"><i class="material-icons">#: data.code #</i></span>' +
                              '<span class="k-state-default"> #: data.name #</span>',
                    dataSource: {
                        transport: {
                            read: {
                                dataType: "json",
                                url: "/assets/backend/icons/material-design-icons/codepoints.json"
                            }
                        }
                    }
                });
            });
        }

        $(document).on('click', '.uk-accordion h3.uk-accordion-title', function(){
            $el = $(this).closest('.bl-accordion-item').find('.uk-accordion-content').slideToggle();
        });

        function refreshAccordion(target)
        {
            menuListAccordion[target.substring(1)] = UIkit.sortable(target);
        }

        function toggleModal(target)
        {
            if(modalList[target.substring(1)] === undefined)
                modalList[target.substring(1)] = UIkit.modal(target);
            modalList[target.substring(1)].show();
        }

        function makeid()
        {
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for( var i=0; i < 5; i++ )
                text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text;
        }


    });
</script>
@endpush