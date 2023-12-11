const mix = require("laravel-mix");

mix.options({
    polyfills: [
        'Promise'
    ]
});

mix.webpackConfig({
    stats: {
        children: true,
    },
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

// Common
mix
    .setPublicPath('public')
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/delete.js', 'public/js')
    .styles('resources/css/app.css', 'public/css/app.css')
    .styles('resources/css/material-dashboard.css', 'public/css/material-dashboard.css')
    .version();

// Admin - Manage Post
mix
    .setPublicPath('public')
    .js("resources/js/post/post_add_edit.js", "public/js")
    .js("resources/js/post/post_delete.js", "public/js")
    .styles('resources/css/post/style.css', 'public/css/post/style.css')
    .version();

// Admin - Manage User
mix
    .setPublicPath('public')
    .js("resources/js/user/user_delete.js", "public/js")
    .styles('resources/css/user/style.css', 'public/css/user/style.css')
    .version();


// Vue JS
mix
    .js("resources/js/user/main.js", "public/user/js")
    .vue();
