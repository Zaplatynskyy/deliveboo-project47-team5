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

//  backend
mix.js('resources/js/admin/admin.js', 'public/js')
    .sass('resources/sass/admin/admin.scss', 'public/css');

// frontend
mix.js('resources/js/front/front.js', 'public/js')
    .sass('resources/sass/front/front.scss', 'public/css');