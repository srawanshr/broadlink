@if (Session::has('success'))
    <div class="uk-alert uk-alert-success">
        <button type="button" class="uk-alert-close uk-close">×</button>
        <strong><i class="zmdi zmdi-check-circle"></i>&nbsp;Success!</strong>
        {{ Session::get('success') }}
    </div>
@endif