@extends('backend.layout')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_b uk-margin-bottom">Dashboard</h3>
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right">
                                <i class="material-icons md-48">&#xE7FC;</i>
                            </div>
                            <span class="uk-text-muted uk-text-small">Customers</span>
                            <h2 class="uk-margin-remove">
                                <span>{{ $count['users'] }}</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right">
                                <i class="material-icons md-48">&#xE06A;</i>
                            </div>
                            <span class="uk-text-muted uk-text-small">Pins</span>
                            <h2 class="uk-margin-remove">
                                <span>{{ $count['pins'] }}</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right">
                                <i class="material-icons md-48">&#xE85D;</i>
                            </div>
                            <span class="uk-text-muted uk-text-small">Orders This Week</span>
                            <h2 class="uk-margin-remove">
                                <span>{{ $count['orders'] }}</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right">
                                <i class="material-icons md-48">&#xE060;</i>
                            </div>
                            <span class="uk-text-muted uk-text-small">Posts This Week</span>
                            <h2 class="uk-margin-remove">
                                <span>{{ $count['posts'] }}</span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="heading_b uk-margin-bottom">Getting Started</h3>
            <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 uk-margin-large-bottom hierarchical_show" data-uk-grid="{gutter: 20}">
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <p>Change website information, website pop up ad, website default contacts from the
                                "Settings" tab on the sidebar or by clicking the button below.</p>
                            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="{{ route('admin::setting') }}">
                                Settings
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <p>Many pages have <strong>fab icons</strong> on the bottom right.</p>
                            <p>They redirect you to create pages.</p>
                            <button type="button" class="md-fab md-fab-success md-fab-wave-light waves-effect waves-button waves-light" onclick="UIkit.modal.alert('<h2 class=\'uk-text-center\'>This is a fab icon!</h2>')">
                                <i class="material-icons">&#xE8D0;</i>
                            </button>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <p>Add new items to menu from the
                                <span class="uk-text-primary">menu</span>
                                tab on the sidebar
                            </p>
                            <p><strong>Home, Service, Shop and User</strong> items are built-in.</p>
                            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="{{ route('admin::menu') }}">
                                Menu
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <p>The sequence for creating products.</p>
                            <p><strong>Service > Plan > Product</strong></p>
                            <p>Deleting pre-inserted services is <strong>not recommended.</strong></p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <p>Create new pages such as FAQ, Help, etc from the pages tab on the sidebar or by clicking
                                the button below.</p>
                            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="{{ route('admin::page.create') }}">
                                Pages
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop