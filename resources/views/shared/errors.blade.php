@if (count($errors) > 0)
    <div class="uk-grid">
        <div class="uk-width-1-1">
            <div class="uk-alert uk-alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif