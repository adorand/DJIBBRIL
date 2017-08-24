var gulp = require('gulp');
var sync = require('browser-sync').create();

var sass = require('gulp-sass');

gulp.task('sass', function() {
    return gulp.src("css/sass/*")
        .pipe(sass())
        .pipe(gulp.dest("css/"))
        .pipe(sync.stream());

});

var KDI="/media/jacques/f643686e-f0ca-45a2-b1d3-b754867289541/ado/LINUX/save/HTML/DJIBBRIL/WORDPRESS/wp-content/themes/KDI";
var KDI_css=KDI+"/css/";
var KDI_js=KDI+"/js/";

gulp.task('COPY_html', function()
{
    return gulp.src("*.html")
        .pipe(gulp.dest(KDI,{overwrite: true}));
});

gulp.task('COPY_css', function()
{
    return gulp.src("css/*.css")
        .pipe(gulp.dest(KDI_css,{overwrite: true}));
});

gulp.task('COPY_js', function()
{
    return ( gulp.src("js/*")
        .pipe(gulp.dest(KDI_js,{overwrite: true})) && gulp.src("js/**/*").pipe(gulp.dest(KDI_js,{overwrite: true})) );
});


gulp.task('serve', function() {
    sync.init({
        server: { baseDir: "./" }
    });

    gulp.watch("*.html",['COPY_html']).on('change', sync.reload);
    gulp.watch("css/*.css",['COPY_css']).on('change', sync.reload);
    gulp.watch("js/*",['COPY_js']).on('change', sync.reload);
    gulp.watch("js/**/*",['COPY_js']).on('change', sync.reload);
    gulp.watch("css/sass/*.scss", ['sass']);
});


gulp.task('default', ['serve']);


