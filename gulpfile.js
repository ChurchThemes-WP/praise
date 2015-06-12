var gulp         = require('gulp');
var sass         = require('gulp-sass');
var minifyCSS    = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('sass', function () {
  gulp.src('./assets/style/**/*.scss')
    .pipe(sass({
      errLogToConsole: true
    }))
    .pipe(autoprefixer())
    .pipe(minifyCSS())
    .pipe(gulp.dest('./'));
});

gulp.task('watch', function() {
  gulp.watch('./assets/style/**/*.scss', ['sass']);
});

gulp.task('default', ['build','watch'], function() {});
gulp.task('build', ['sass'], function() {});
