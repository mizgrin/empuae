const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');

// Task to compile and minify SCSS
gulp.task('build:scss', function() {
    return gulp.src('src/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS())  // Minify CSS
        .pipe(gulp.dest('dist/assets/styles/css'));
});

// Task to compile and minify JS
gulp.task('build:js', function() {
    return gulp.src('src/js/**/*.js')
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(uglify())  // Minify JS
        .pipe(gulp.dest('dist/assets/js'));
});

// Watch task
gulp.task('watch', function() {
    gulp.watch('src/scss/**/*.scss', gulp.series('build:scss'));
    gulp.watch('src/js/**/*.js', gulp.series('build:js'));
});

// Default task
gulp.task('default', gulp.series('build:scss', 'build:js', 'watch'));
