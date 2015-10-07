var gulp = require('gulp');
var rename = require('gulp-rename');
var elixir = require('laravel-elixir');
var BrowserSync = require('laravel-elixir-browser-sync-simple');
require('laravel-elixir-imagemin');
require('laravel-elixir-modernizr');

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


    mix.scripts([
        'js/jquery.js',
        'js/jquery.dataTables.js',
        'js/dataTables.bootstrap.js'
    ],
    'public/assets/js/admin.js',
    'resources/assets'
    );

    mix.sass('app.scss', 'public/assets/css/app.css')
        .imagemin("resources/assets/images", "public/assets/images/")
        .modernizr([
                "public/assets/css/**/*.css",
                "public/assets/js/**/*.js"
            ],
            "public/assets/js/vendor/modernizr-custom.js"
        )
        .browserSync({
            proxy: "learntech.app",
            files: [
                "app/**/*",
                "public/**/*",
                "resources/views/**/*",
                "vendor/**/*"
            ]
        });
});
