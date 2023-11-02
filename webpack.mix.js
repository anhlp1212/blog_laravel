let mix = require('laravel-mix');

mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');

//header_post
mix.copy('resources/css/nucleo-icons.css', 'public/css');
mix.copy('resources/css/nucleo-svg.css', 'public/css');
mix.copy('resources/css/material-dashboard.css', 'public/css');
mix.copy('resources/css/Post/style.css', 'public/css/Post');

//footer_post
mix.copy('resources/js/font-awesome-icons.js', 'public/js');
mix.copy('resources/js/core/popper.min.js', 'public/js/core');
mix.copy('resources/js/core/bootstrap.min.js', 'public/js/core');
mix.copy('resources/js/plugins/perfect-scrollbar.min.js', 'public/js/plugins');
mix.copy('resources/js/plugins/smooth-scrollbar.min.js', 'public/js/plugins');
mix.copy('resources/js/material-dashboard.min.js', 'public/js');

//aside
mix.copy('resources/img/logo-ct.png', 'public/images');

//nav_bar
mix.copy('resources/img/team-2.jpg', 'public/images');
mix.copy('resources/img/small-logos/logo-spotify.svg', 'public/images/small-logos');

//dashboard
mix.copy('resources/img/small-logos/logo-xd.svg', 'public/images/small-logos');
mix.copy('resources/img/team-1.jpg', 'public/images');
mix.copy('resources/img/team-3.jpg', 'public/images');
mix.copy('resources/img/team-4.jpg', 'public/images');
mix.copy('resources/img/small-logos/logo-atlassian.svg', 'public/images/small-logos');
mix.copy('resources/img/small-logos/logo-slack.svg', 'public/images/small-logos');
mix.copy('resources/img/small-logos/logo-jira.svg', 'public/images/small-logos');
mix.copy('resources/img/small-logos/logo-invision.svg', 'public/images/small-logos');

