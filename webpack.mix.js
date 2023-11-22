const mix = require("laravel-mix");

mix.options({
    polyfills: [
        'Promise'
    ]
});
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

mix.styles([
    'resources/css/material-dashboard.css',
], 'public/css/material-dashboard.css');

mix.styles([
    'resources/css/post/style.css',
], 'public/css/post/style.css');

mix.styles([
    'resources/css/user/style.css',
], 'public/css/user/style.css');

mix.styles([
    'resources/css/app.css',
], 'public/css/app.css');

mix.js('resources/js/app.js', 'public/js').version();
