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
	/*
	 |--------------------------------------------------------------------------
	 | Backend Assets
	 |--------------------------------------------------------------------------
	 |
	 */
    mix.styles(['main.css'], 'public/assets/backend/css/main.min.css')
       .styles(['my_theme.css'], 'public/assets/backend/css/my_theme.min.css');

    mix.scripts(['pages/login.js'], 'public/assets/backend/js/pages/login.min.js')
       .scripts(['pages/forms_wysiwyg.js'], 'public/assets/backend/js/pages/forms_wysiwyg.min.js')
       .scripts(['pages/plugins_datatables.js'], 'public/assets/backend/js/pages/plugins_datatables.min.js')
       .scripts(['pages/forms_file_input.js'], 'public/assets/backend/js/pages/forms_file_input.min.js');
	/*
	 |--------------------------------------------------------------------------
	 | Frontend Assets
	 |--------------------------------------------------------------------------
	 |
	 */
    mix.sass('app.scss', 'public/assets/frontend/css/app.css')
	   .styles([
		   'vendors/uikit/uikit.min.css',
		   'vendors/uikit/components/sticky.css',
		   'vendors/uikit/components/slider.css',
		   'vendors/icon-font-7/pe-icon-7-stroke/css/pe-icon-7-stroke.css',
		   'vendors/icon-font-7/pe-icon-7-stroke/css/helper.css'
	   ], 'public/assets/frontend/css/dep.css')
	   .scripts([
		   'vendors/jquery/jquery.min.js',
		   'vendors/uikit/uikit.min.js',
		   'vendors/uikit/components/sticky.js',
		   'vendors/uikit/components/parallax.js',
		   'vendors/uikit/components/slider.js',
		   'vendors/greensock-js/src/minified/TweenMax.min.js',
		   'vendors/jquery-parallax/jquery-parallax.js'
	   ], 'public/assets/frontend/js/dep.js');
});
