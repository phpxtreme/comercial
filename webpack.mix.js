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

mix.babel([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/jquery-ui-dist/jquery-ui.js',
    'node_modules/bootstrap/dist/js/bootstrap.js',
    'node_modules/chosen-js/chosen.jquery.js',
], 'public/js/core.js');
mix.sass('resources/sass/core.scss', 'public/css')
mix.scripts(['resources/js/app.js'], 'public/js/app.js');
mix.scripts(['resources/js/items.js'], 'public/js/items.js');