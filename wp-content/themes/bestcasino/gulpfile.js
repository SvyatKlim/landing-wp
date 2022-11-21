// Импорт пакетов
const gulp = require('gulp'),
    sass = require('gulp-sass')(require('sass')),
    rename = require('gulp-rename'),
    cleanCSS = require('gulp-clean-css'),
    babel = require('gulp-babel'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    size = require('gulp-size'),
    webpack = require('webpack-stream'),
    del = require('del'),
    webpackConfig = require ("./webpack.config.js");

const paths = {
    styles: {
        src: ['src/styles/**/*.scss', 'src/styles/**/*.css'],
        dest: 'assets/css/'
    },
    scripts: {
        src: ['node_modules/babel-polyfill/dist/polyfill.js', 'src/scripts/**/*.js'],
        dest: 'assets/js/'
    },
}

function clean() {
    return del(['assets/css/*', 'assets/js/*'])
}

function styles() {
    return gulp.src(paths.styles.src)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(cleanCSS({
            level: 2
        }))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(size({
            showFiles: true
        }))
        .pipe(gulp.dest(paths.styles.dest))
}

function scripts() {
    return gulp.src(paths.scripts.src)
        .pipe(webpack(webpackConfig.dev))
        .pipe(size({
            showFiles: true
        }))
        .pipe(gulp.dest(paths.scripts.dest))
}

function scriptsProd() {
    return gulp.src(paths.scripts.src)
        .pipe(webpack(webpackConfig.prod))
        .pipe(uglify())
        .pipe(size({
            showFiles: true
        }))
        .pipe(gulp.dest(paths.scripts.dest))
}

function watch() {
    gulp.watch(paths.styles.src, styles)
    gulp.watch(paths.scripts.src, scripts)
}

// Таски для ручного запуска с помощью gulp clean, gulp html и т.д.
exports.clean = clean
exports.styles = styles
exports.scripts = scripts
exports.watch = watch

// Таск, который выполняется по команде gulp
exports.default = gulp.series(clean, gulp.parallel(styles, scripts), watch)
exports.prod = gulp.series(clean, gulp.parallel(styles, scriptsProd))