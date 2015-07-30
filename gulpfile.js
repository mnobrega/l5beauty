var gulp = require('gulp');
var rename = require('gulp-rename');
var elixir = require('laravel-elixir');

/**
 * Copy any needed files.
 *
 * Do a 'gulp copyfiles' after bower updates
 */

gulp.task("copyfiles", function() {
    gulp.src("vendor/bower_dl/jquery/dist/jquery.js").pipe(gulp.dest("resources/assets/js"));
    gulp.src("vendor/bower_dl/bootstrap/less/**").pipe(gulp.dest("resources/assets/less/bootstrap"));
    gulp.src("vendor/bower_dl/bootstrap/dist/js/bootstrap.js").pipe(gulp.dest("resources/assets/js"));
    gulp.src("vendor/bower_dl/bootstrap/dist/fonts/**").pipe(gulp.dest("public/assets/fonts"));
    gulp.src("vendor/bower_dl/fontawesome/less/**").pipe(gulp.dest("resources/assets/less/fontawesome"));
    gulp.src("vendor/bower_dl/fontawesome/fonts/**").pipe(gulp.dest("public/assets/fonts"));

    //copy datatables
    var dtDir = 'vendor/bower_dl/datatables-plugins/integration/';
    gulp.src("vendor/bower_dl/datatables/media/js/jquery.dataTables.js").pipe(gulp.dest("resources/assets/js/"));
    gulp.src(dtDir+'bootstrap/3/dataTables.bootstrap.css').pipe(rename('dataTables.bootstrap.less')).pipe(gulp.dest("resources/assets/less/others/"));
    gulp.src(dtDir+'bootstrap/3/dataTables.bootstrap.js').pipe(gulp.dest("resources/assets/js/"));
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
            'js/jquery.js',
            'js/bootstrap.js',
            'js/jquery.dataTables.js',
            'js/dataTables.bootstrap.js'
    ],
    'public/assets/js/admin.js',
    'resources/assets');

    mix.less('admin.less','public/assets/css/admin.css');
});
