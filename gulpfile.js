var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();
var scsslint = require('gulp-scss-lint');

gulp.task('watch', function(){
  gulp.watch('library/scss/**/*.scss', ['sass']);
  // Other watchers
  browserSync.init({
        port: 8000,
        proxy: "http://localhost:8000"
    });
    gulp.watch("./*.php").on("change", browserSync.reload);
    gulp.watch("./library/scss/**/*.scss").on("change", browserSync.reload);
})

gulp.task('sass', ['scss-lint'], function(){
  return gulp.src('library/scss/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe( autoprefixer( 'last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4' ) )
    .pipe(gulp.dest('library/css'))
});

gulp.task('scss-lint', function() {
  return gulp.src('library/scss/**/*.scss')
  .pipe(scsslint({
    'maxBuffer': 907200,
    'config': 'scss-lint.yml'
  }))
});

gulp.task('default', ['sass', 'scss-lint', 'watch']);
