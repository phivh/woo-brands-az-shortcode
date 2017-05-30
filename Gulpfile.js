'use strict';
var gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    sass = require('gulp-sass');

gulp.task('style', function() {
    return gulp.src('**.scss')
        .pipe(sass.sync({ outputStyle: 'nested' })).on('error', sass.logError)
        .pipe(autoprefixer({
            browsers: ['> 1%', 'last 2 versions', 'Firefox ESR']
        }))
        .pipe(gulp.dest('./'));
});

gulp.task('watch', function() {
    gulp.watch('**.scss', ['style']);
});

gulp.task('default', ['watch', 'style']);