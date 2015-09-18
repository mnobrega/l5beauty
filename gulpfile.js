var gulp = require('gulp');
var rename = require('gulp-rename');
var elixir = require('laravel-elixir');

/**
 * Copy any needed files.
 *
 * Do a 'gulp copyfiles' after bower updates
 */

gulp.task("copyfiles", function() {
    gulp.src("vendor/bower_dl/jquery/dist/jquery.js").pipe(gulp.dest("resources/assets/js/vendor/"));
    gulp.src("vendor/bower_dl/bootstrap/less/**").pipe(gulp.dest("resources/assets/less/vendor/bootstrap/"));
    gulp.src("vendor/bower_dl/bootstrap/dist/js/bootstrap.js").pipe(gulp.dest("resources/assets/js/vendor/"));
    gulp.src("vendor/bower_dl/bootstrap/dist/fonts/**").pipe(gulp.dest("public/fonts/"));
    gulp.src("vendor/bower_dl/fontawesome/less/**").pipe(gulp.dest("resources/assets/less/vendor/fontawesome/"));
    gulp.src("vendor/bower_dl/fontawesome/fonts/**").pipe(gulp.dest("public/fonts/"));

    //copy datatables
    var dtDir = 'vendor/bower_dl/datatables-plugins/integration/';
    gulp.src("vendor/bower_dl/datatables/media/js/jquery.dataTables.js").pipe(gulp.dest("resources/assets/js/vendor/"));
    gulp.src(dtDir+'bootstrap/3/dataTables.bootstrap.css').pipe(rename('dataTables.bootstrap.less')).pipe(gulp.dest("resources/assets/less/vendor/others/"));
    gulp.src(dtDir+'bootstrap/3/dataTables.bootstrap.js').pipe(gulp.dest("resources/assets/js/vendor/"));

    //copy selectize
    gulp.src("vendor/bower_dl/selectize/dist/css/**").pipe(gulp.dest("public/css/selectize/"));
    gulp.src("vendor/bower_dl/selectize/dist/js/standalone/selectize.min.js").pipe(gulp.dest("public/js/selectize/"));

    //copy pickadate
    gulp.src("vendor/bower_dl/pickadate/lib/compressed/themes/**").pipe(gulp.dest("public/css/pickadate/themes/"));
    gulp.src("vendor/bower_dl/pickadate/lib/compressed/picker.js").pipe(gulp.dest("public/js/pickadate/"));
    gulp.src("vendor/bower_dl/pickadate/lib/compressed/picker.date.js").pipe(gulp.dest("public/js/pickadate/"));
    gulp.src("vendor/bower_dl/pickadate/lib/compressed/picker.time.js").pipe(gulp.dest("public/js/pickadate/"));

    //copy clean-blog less files
    gulp.src("vendor/bower_dl/clean-blog/less/**").pipe(gulp.dest("resources/assets/less/vendor/clean-blog"));

    //jointjs files
    gulp.src("vendor/bower_dl/backbone/backbone-min.js").pipe(gulp.dest("public/js/backbone/"));
    gulp.src("vendor/bower_dl/lodash/lodash.min.js").pipe(gulp.dest("public/js/lodash/"));
    gulp.src("vendor/bower_dl/jointjs/dist/joint.js").pipe(gulp.dest("public/js/jointjs"));
    gulp.src("vendor/bower_dl/jointjs/joint.css").pipe(gulp.dest("public/css/jointjs"));

    //maplace
    gulp.src("vendor/bower_dl/maplace.js/src/maplace-0.1.3.min.js").pipe(gulp.dest("public/js/maplace-js"));
});

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
    mix.scripts([
            'vendor/jquery.js',
            'vendor/bootstrap.js',
            'vendor/jquery.dataTables.js',
            'vendor/dataTables.bootstrap.js'
    ],
    'public/js/admin.js', 'resources/assets/js/');

    mix.scripts([
            'vendor/jquery.js',
            'vendor/bootstrap.js',
            'blog.js'
    ],'public/js/blog.js', 'resources/assets/js/');

    mix.less('admin.less','public/css/admin.css');
    mix.less('blog.less','public/css/blog.css');
});
