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
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/_contact.scss', 'public/css')
   .sass('resources/sass/_footer.scss', 'public/css')
   .sass('resources/sass/_global.scss', 'public/css')
   .sass('resources/sass/_masthead.scss', 'public/css')
   .sass('resources/sass/_mixins.scss', 'public/css')
   .sass('resources/sass/_navbar.scss', 'public/css')
   .sass('resources/sass/_portofolio.scss', 'public/css')
   .sass('resources/sass/_services.scss', 'public/css')
   .sass('resources/sass/_team.scss', 'public/css')
   .sass('resources/sass/_timeline.scss', 'public/css')
   .sass('resources/sass/_variables.scss', 'public/css')
   .sass('resources/sass/agency.scss', 'public/css');
