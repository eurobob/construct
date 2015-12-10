var gulp = require('gulp');
var rename = require('gulp-rename');
var elixir = require('laravel-elixir');
require('laravel-elixir-imagemin');
require('laravel-elixir-modernizr');

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

 gulp.task("copyfiles", function(){

    gulp.src("vendor/bower_dl/jquery/dist/jquery.js")
        .pipe(gulp.dest("resources/assets/js/"));

    // Copy datatables
    var dtDir = 'vendor/bower_dl/datatables-plugins/integration/';

    gulp.src("vendor/bower_dl/datatables/media/js/jquery.dataTables.js")
        .pipe(gulp.dest('resources/assets/js/'));

    gulp.src(dtDir + 'bootstrap/3/dataTables.bootstrap.css')
        .pipe(rename('dataTables.bootstrap.scss'))
        .pipe(gulp.dest('resources/assets/sass/others/'));

    gulp.src(dtDir + 'bootstrap/3/dataTables.bootstrap.js')
        .pipe(gulp.dest('resources/assets/js/'));

    // Copy selectize
    gulp.src("vendor/bower_dl/selectize/dist/css/**")
        .pipe(gulp.dest("public/assets/selectize/css"));

    gulp.src("vendor/bower_dl/selectize/dist/js/standalone/selectize.min.js")
        .pipe(gulp.dest("public/assets/selectize/"));

    // Copy pickadate
    gulp.src("vendor/bower_dl/pickadate/lib/compressed/themes/**")
        .pipe(gulp.dest("public/assets/pickadate/themes/"));

    gulp.src("vendor/bower_dl/pickadate/lib/compressed/picker.js")
        .pipe(gulp.dest("public/assets/pickadate/"));

    gulp.src("vendor/bower_dl/pickadate/lib/compressed/picker.date.js")
        .pipe(gulp.dest("public/assets/pickadate/"));

    gulp.src("vendor/bower_dl/pickadate/lib/compressed/picker.time.js")
        .pipe(gulp.dest("public/assets/pickadate/"));

 });

elixir(function(mix) {

    mix.browserSync({
        browser: settings.browser,
        files: [
            'public/assets/css/app.css',
            'public/assets/js/main.js',
            'public/assets/js/form.js',
            'resources/views/**/*'
        ],
        proxy: settings.localURL
    });

    mix.gulpicon();

    mix.imagemin("resources/assets/images", "public/build/assets/images/");
    
    mix.modernizr([
            "resources/views/**/*.php",
            "public/assets/css/app.css",
            "public/assets/js/**/*.js"
        ],
        "public/assets/js/vendor/modernizr-custom.js",
        {
            "tests": settings.modernizrTests,
            "options": settings.modernizrOptions
        }
    );

    mix.sass('app.scss', 'public/assets/css/app.css')
        .sass('ie.scss', 'public/assets/css/ie.css');

    mix.scripts([
            'jquery.js',
            'jquery.dataTables.js',
            'dataTables.bootstrap.js'
        ],
        'public/assets/js/admin.js'
    ).scripts([
            'main.js'
        ],
        'public/assets/js/main.js'
    );

    mix.version([
        'public/assets/css/app.css',
        'public/assets/css/ie.css',
        'public/assets/js/main.js',
        'public/assets/js/admin.js',
        'public/assets/js/vendor/modernizr-custom.js'
    ]);
});
