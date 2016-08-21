const elixir = require('laravel-elixir');
require('laravel-elixir-vue');

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

elixir(mix => {
    mix.sass('app.scss')  
       .webpack('app.js')
       .webpack(['/dashboard/app.js'], 'public/js/dashboard/app.js')
       .sass([
    		'/dashboard/timeline.scss',
    		'/dashboard/sb-admin-2.scss',
    	], 'public/css/dashboard.css')
       .styles([
    		'/dashboard/metisMenu.min.css',
    		'/dashboard/morris.css'
    	],'public/css/dashboard-extras.css')
       .scripts([
	        '/dashboard/metisMenu.min.js',
	        '/dashboard/raphael-min.js',
	        '/dashboard/morris.min.js',
	        '/dashboard/sb-admin-2.js'
    	], 'public/js/dashboard.js');
});
