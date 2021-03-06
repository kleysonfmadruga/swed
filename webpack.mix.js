const mix = require('laravel-mix');
const glob = require('glob');

mix.version();

function syncResources(pattern, callback) {
    (glob.sync('resources/' + pattern) || []).forEach(file => {
        file = file.replace(/[\\\/]+/g, '/');
        callback(file, file.replace('resources', 'public'));
    });
}


syncResources('css/global/**/*.css', (src, dest) => mix.styles(src, dest).version());
syncResources('css/pages/**/*.css', (src, dest) => mix.styles(src, dest).version());
syncResources('css/pages/manager/**/*.css', (src, dest) => mix.styles(src, dest).version());

syncResources('js/pages/**/*.js', (src, dest) => mix.copy(src, dest).version());
syncResources('js/etc/*.js', (src, dest) => mix.copy(src, dest).version());
syncResources('js/etc/**/*.js', (src, dest) => mix.copy(src, dest).version());
syncResources('fonts/**/*', (src, dest) => mix.copy(src, dest).version());

syncResources('images/**/*', (src, dest) => mix.copy(src, dest).version());

require('laravel-mix-tailwind');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss')
    ]);

mix.browserSync('127.0.0.1:8000');

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
//

