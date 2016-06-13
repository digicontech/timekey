var gulp = require('gulp');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var prefix = require('gulp-autoprefixer');

var paths = {
  styles: {
      src: 'sass/',
      dest: 'css/',
  },
};

gulp.task('default', ['styles'], function () {});
gulp.task('watch', ['watch_styles'], function () {});

gulp.task('watch_styles', function () {
    return gulp.watch(paths.styles.src + '*.scss', ['styles']);
});

gulp.task('styles', function() {
    return gulp.src(paths.styles.src + '*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(prefix({
            browsers: ['last 2 versions'],
            cascade: false,
        }))
        .pipe(gulp.dest(paths.styles.dest))
        .pipe(minifyCss({compatibility: 'ie8'}))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(paths.styles.dest));
});