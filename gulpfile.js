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
		   'vendors/uikit/components/slideshow.css',
		   'vendors/uikit/components/slidenav.css',
		   'vendors/uikit/components/dotnav.css',
		   'vendors/uikit/components/accordion.css',
	   ], 'public/assets/frontend/css/dep.css')
	   .scripts([
		   'vendors/jquery/jquery.min.js',
		   'vendors/uikit/uikit.min.js',
		   'vendors/uikit/components/sticky.js',
		   'vendors/uikit/components/parallax.js',
		   'vendors/uikit/components/slider.js',
		   'vendors/uikit/components/slideshow.js',
		   'vendors/uikit/components/slideset.js',
		   'vendors/uikit/components/accordion.js',
		   'vendors/greensock-js/src/minified/TweenMax.min.js',
		   'vendors/jquery-parallax/jquery-parallax.js'
	   ], 'public/assets/frontend/js/dep.js');
});
