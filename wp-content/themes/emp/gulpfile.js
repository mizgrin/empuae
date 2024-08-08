const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const babel = require('gulp-babel');

gulp.task('build:scss', function() {
    return gulp.src('src/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('dist/assets/styles/css'));
});

gulp.task('build:js', function() {
    return gulp.src('src/js/**/*.js')
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(gulp.dest('dist/assets/js'));
});

gulp.task('watch', function() {
    gulp.watch('src/scss/**/*.scss', gulp.series('build:scss'));
    gulp.watch('src/js/**/*.js', gulp.series('build:js'));
});

gulp.task('default', gulp.series('build:scss', 'build:js', 'watch'));
