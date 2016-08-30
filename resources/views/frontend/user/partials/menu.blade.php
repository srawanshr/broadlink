<div class="uk-width-medium-1-4 uk-width-small-1-3 bl-block-primary">
    <div class="uk-cover-background">
        <img src="{{ user_avatar('user', 190) }}" class="uk-width-1-1 avatar">
    </div>
    <div class="bl-padding uk-block-default bl-block-primary-lightest">
        {{ $user->display_name }}
    </div>
    <div class="details bl-padding bl-block-primary-lighter">
        <ul class="fa-ul">
            <li>
                <a href="{{ route('user::dashboard') }}" class="uk-vertical-align-middle">
                    <i class="fa-li material-icons">&#xE871;</i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('user::edit') }}" class="uk-vertical-align-middle">
                    <i class="fa-li material-icons">&#xE853;</i>
                    Update your profile
                </a>
            </li>
            <li>
                <a href="#" class="uk-vertical-align-middle" data-uk-modal="{target:'#changePassword'}">
                    <i class="fa-li material-icons">&#xE0DA;</i>
                    Change password
                </a>
            </li>
        </ul>
    </div>
    <div class="details bl-padding bl-block-primary-light">
        <ul class="fa-ul">
            <li>
                <a href="{{ route('service::index') }}" class="uk-vertical-align-middle">
                    <i class="fa-li material-icons">&#xE5C3;</i>
                    Discover more features
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="uk-modal" id="changePassword">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        {{ Form::open(['route' => ['user::changePassword', auth()->guard('user')->user()->slug], 'class' => 'uk-form', 'method' => 'put']) }}
        <div class="uk-modal-header">
            <h2>Change Password</h2>
        </div>
        <div class="uk-form-row">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    {{ Form::label('old_password', 'Old Password') }}
                    {{ Form::password('old_password', ['class'=>'uk-width-1-1', 'id'=>'old_password']) }}
                </div>
                <div class="uk-width-1-1">
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password', ['class'=>'uk-width-1-1', 'id'=>'password']) }}
                </div>
                <div class="uk-width-1-1">
                    {{ Form::label('password_confirmation', 'Repeat Password') }}
                    {{ Form::password('password_confirmation', ['class'=>'uk-width-1-1', 'id'=>'password_confirmation']) }}
                </div>
            </div>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button type="button" class="uk-button uk-modal-close">Cancel</button>
            <button type="submit" class="uk-button uk-button-primary">Save</button>
        </div>
        {{ Form::close() }}
    </div>
</div>