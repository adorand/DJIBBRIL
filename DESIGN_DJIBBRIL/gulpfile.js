var gulp = require('gulp');
var sync = require('browser-sync').create();

var sass = require('gulp-sass');

gulp.task('sass', function() {
    return gulp.src("css/sass/*")
        .pipe(sass())
        .pipe(gulp.dest("css/"))
        .pipe(sync.stream());

});

gulp.task('serve', function() {
    sync.init({
        server: { baseDir: "./" }
    });
    gulp.watch("*.html").on('change', sync.reload);
    gulp.watch("css/*.css").on('change', sync.reload);
    gulp.watch("js/*.js").on('change', sync.reload);
    gulp.watch("js/*.js").on('change', sync.reload);
    gulp.watch("css/sass/*.scss", ['sass']);
});


gulp.task('default', ['serve']);


