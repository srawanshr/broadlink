var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles(['main.css'], 'public/assets/backend/css/main.min.css')
       .styles(['my_theme.css'], 'public/assets/backend/css/my_theme.min.css');

    mix.scripts(['pages/login.js'], 'public/assets/backend/js/pages/login.min.js')
       .scripts(['pages/forms_wysiwyg.js'], 'public/assets/backend/js/pages/forms_wysiwyg.min.js')
       .scripts(['pages/forms_file_input.js'], 'public/assets/backend/js/pages/forms_file_input.min.js');
});
