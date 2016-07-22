@extends('backend.layout')

@section('title', 'Settings')

@section('content')
    <div id="page_content">
        <div id="page_content_inner">
            <h4 class="heading_a uk-margin-bottom">Settings</h4>
            {{ Form::open(['route' => 'admin::setting.update', 'class' => 'uk-form-stacked', 'id' => 'site_settings', 'method' => 'put']) }}
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-1-3 uk-width-medium-1-1">
                        <div class="md-card">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                    {{ config('website.title') }} Contacts
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <div class="uk-form-row">
                                    <label for="settings_address">Address</label>
                                    <textarea class="md-input" name="setting['address']" id="settings_address" cols="30" rows="3">{{ setting('address') }}</textarea>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_phone">Phone</label>
                                    <input class="md-input" type="text" id="settings_phone" name="setting['phone']" value="{{ setting('phone') }}"/>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_fax">Fax</label>
                                    <input class="md-input" type="text" id="settings_fax" name="setting['fax']" value="{{ setting('fax') }}"/>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_email">Email</label>
                                    <input class="md-input" type="text" id="settings_email" name="setting['email']" value="{{ setting('email') }}"/>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_gpo">GPO</label>
                                    <input class="md-input" type="text" id="settings_gpo" name="setting['gpo']" value="{{ setting('gpo') }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-large-1-3 uk-width-medium-1-2">
                        <div class="md-card">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                    Business Hours
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <div class="uk-form-row">
                                    <label for="settings_bh_sales">Sales</label>
                                    <textarea class="md-input" name="setting['bh-sales']" id="settings_bh_sales" cols="30" rows="2">{{ setting('bh-sales') }}</textarea>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_customer_care">Customer Care</label>
                                    <textarea class="md-input" name="setting['bh-customer-care']" id="settings_customer_care" cols="30" rows="2">{{ setting('bh-customer-care') }}</textarea>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_technical_support">Technical Support</label>
                                    <textarea class="md-input" name="setting['bh-technical-support']" id="settings_technical_support" cols="30" rows="2">{{ setting('bh-technical-support') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-large-1-3 uk-width-medium-1-2">
                        <div class="md-card">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                    Social Links
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <div class="uk-form-row">
                                    <label for="settings_facebook">Facebook</label>
                                    <input class="md-input" type="text" id="settings_facebook" name="setting['facebook']" value="{{ setting('facebook') }}"/>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_twitter">Twitter</label>
                                    <input class="md-input" type="text" id="settings_twitter" name="setting['twitter']" value="{{ setting('twitter') }}"/>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_google_plus">Google Plus</label>
                                    <input class="md-input" type="text" id="settings_google_plus" name="setting['google-plus']" value="{{ setting('google-plus') }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="md-card">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                    Others
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <div class="uk-form-row">
                                    <label for="settings_broad_tel_messenger_users">Broadtel Messenger Users</label>
                                    <input class="md-input" type="text" id="settings_broad_tel_messenger_users" name="setting['broad-tel-messenger-users']" value="{{ setting('broad-tel-messenger-users') }}"/>
                                </div>
                                <div class="uk-form-row">
                                    <label for="settings_phone_technical_support">Technical Support</label>
                                    <input class="md-input" type="text" id="settings_phone_technical_support" name="setting['technical-support']" value="{{ setting('phone-technical-support') }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md-fab-wrapper">
                    <button type="submit" class="md-fab md-fab-primary" href="#" id="page_settings_submit">
                        <i class="material-icons">&#xE161;</i>
                    </button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop