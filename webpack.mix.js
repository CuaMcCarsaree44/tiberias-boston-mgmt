const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix    /* CSS */
    .sass('resources/sass/main.scss', 'public/css/dashmix.css')
    .sass('resources/sass/dashmix/themes/xwork.scss', 'public/css/themes/')

    /* JS */
    .js('resources/js/laravel/app.js', 'public/js/laravel.app.js')
    .scripts([

        /**
         * jQuery Module
         */
        'resources/js/laravel/jQuery/*.js', 
    ], 'public/js/main.app.js')
    
    .js('resources/js/dashmix/app.js', 'public/js/dashmix.app.js')
