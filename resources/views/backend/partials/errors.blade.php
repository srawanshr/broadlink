@if( !empty( $errors->all() ) )
    <div class="uk-alert uk-alert-warning" data-uk-alert>
        <a href="#" class="uk-alert-close uk-close"></a>
        <?php $dumpErrors = []; ?>
        @foreach( $errors->all() as $pos => $error )
            @if( !in_array($error, $dumpErrors) )
                <li>{{ $error }}</li>
                <?php $dumpErrors[] = $error; ?>
            @endif
        @endforeach
    </div>
@endif