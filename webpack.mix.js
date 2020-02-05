const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

// Frontend Styles
mix.styles([
    'public/frontend/css/bootstrap.min.css',
    'public/frontend/css/font-awesome.min.css',
    'public/frontend/css/prettyPhoto.css',
    'public/frontend/css/price-range.css',
    'public/frontend/css/animate.css',
    'public/frontend/css/main.css',
    'public/frontend/css/responsive.css',
], 'public/css/frontend.css');
// Frontend js
mix.scripts([
    'public/frontend/js/bootstrap.min.js',
    'public/frontend/js/jquery.scrollUp.min.js',
    'public/frontend/js/price-range.js',
    'public/frontend/js/jquery.prettyPhoto.js',
    'public/frontend/js/main.js',
], 'public/js/frontend.js');
