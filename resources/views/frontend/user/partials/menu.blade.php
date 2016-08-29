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
                <a href="{{ route('user::dashboard') }}">
                    <i class="fa-li material-icons">&#xE871;</i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('user::edit') }}">
                    <i class="fa-li material-icons">&#xE853;</i>
                    Update your profile
                </a>
            </li>
            <li>
                <i class="fa-li material-icons">&#xE0DA;</i>
                <a href="#">Change password</a>
            </li>
        </ul>
    </div>
    <div class="details bl-padding bl-block-primary-light">
        <ul class="fa-ul">
            <li>
                <i class="fa-li material-icons">&#xE5C3;</i>
                <a href="{{ route('service::index') }}">Discover more features</a>
            </li>
        </ul>
    </div>
</div>