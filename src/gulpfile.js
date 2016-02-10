var gulp = require('gulp');
var elixir = require('laravel-elixir');
require('laravel-elixir-imagemin');
require('laravel-elixir-modernizr');
require('laravel-elixir-gulpicon');

var settings = require('./settings.js');

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

elixir(function(mix) {

    mix.browserSync({
        browser: settings.browser,
        files: [
            'public/css/app.css',
            'public/js/admin.js',
            'resources/views/**/*'
        ],
        proxy: settings.localURL
    });

    mix.gulpicon();

    mix.imagemin("resources/assets/images", "public/build/assets/images/");
    
    mix.modernizr([
            "resources/views/**/*.php",
            "public/css/app.css",
            "public/js/**/*.js"
        ],
        "public/js/vendor/modernizr-custom.js",
        {
            "tests": settings.modernizrTests,
            "options": settings.modernizrOptions
        }
    );

    mix.sass('app.scss', 'public/css/app.css')
        .sass('ie.scss', 'public/css/ie.css');

    mix.browserify('../vendor/build/js/admin.js');
    
    mix.version([
        'public/css/app.css',
        'public/css/ie.css',
        'public/js/admin.js',
        'public/js/vendor/modernizr-custom.js'
    ]);

});
