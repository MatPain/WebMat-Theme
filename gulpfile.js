// Defining base pathes
var basePaths = {
    node: './node_modules/',
    src: './src/'
};


// browser-sync watched files
// automatically reloads the page when files changed
var browserSyncWatchFiles = [
    './assets/css/*.min.css',
    './assets/js/*.js',
    './**/*.php',
	'!dist',
    '!node_modules'
];


// browser-sync options
// see: https://www.browsersync.io/docs/options/
var browserSyncOptions = {
    proxy: "https://localhost/wordpress-dev/",
    notify: false
};

//npm install gulp gulp-plumber gulp-sass gulp-watch gulp-rename gulp-concat gulp-ignore gulp-rimraf gulp-clean-css gulp-sequence browser-sync del --save-dev

// Defining requirements
var gulp = require('gulp');
var plumber = require('gulp-plumber');
var sass = require('gulp-sass');
var watch = require('gulp-watch');

var rename = require('gulp-rename');
var concat = require('gulp-concat');
var ignore = require('gulp-ignore');
var rimraf = require('gulp-rimraf');
var cleanCSS = require('gulp-clean-css');
var gulpSequence = require('gulp-sequence');
var browserSync = require('browser-sync').create();
var del = require('del');



// Run:
// gulp sass
// Compiles SCSS files in CSS
gulp.task('sass', function () {
    var stream = gulp.src( basePaths.src + 'sass/*.scss')
        .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(sass())
        .pipe(gulp.dest('./assets/css'))
    return stream;
});


// Run:
// gulp watch
// Starts watcher. Watcher runs gulp sass task on changes
gulp.task('watch', function () {
    // styles
	gulp.watch([basePaths.src + 'sass/**/*.scss'], ['styles']);

    // scripts
    gulp.watch([basePaths.src + 'js/*.js'], ['scripts']);

});


// Run:
// gulp minify-css
// Minifies CSS files
gulp.task('minify-css', function() {
  return gulp.src('./assets/css/theme.css')
    .pipe(cleanCSS({compatibility: '*'}))
    .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('./assets/css/'));
});

gulp.task('cleancss', function() {
  return gulp.src('./assets/css/*.min.css', { read: false }) // much faster
    .pipe(ignore('theme.css'))
    .pipe(rimraf());
});

gulp.task('styles', function(callback){ gulpSequence('sass', 'minify-css')(callback) });


// Run:
// gulp browser-sync
// Starts browser-sync task for starting the server.
gulp.task('browser-sync', function() {
    browserSync.init(browserSyncWatchFiles, browserSyncOptions);
});


// Run:
// gulp watch-bs
// Starts watcher with browser-sync. Browser-sync reloads page automatically on your browser
gulp.task('watch-bs', ['browser-sync', 'watch', 'scripts'], function () { });


// Run:
// gulp scripts.
// Uglifies and concat all JS files into one
gulp.task('scripts', function() {

    var scripts = [

        basePaths.node + 'tether/dist/js/tether.min.js', // Must be loaded before BS4

        basePaths.node + 'popper.js/dist/umd/popper.min.js', // require for bt4

        basePaths.node + 'bootstrap/dist/js/bootstrap.min.js', // Boostrap4 beta

        basePaths.src + 'js/*.js', // custom

        ];

  gulp.src(scripts)
    .pipe(concat('theme.js'))
    .pipe(gulp.dest('./assets/js/'));
});

// Run
// gulp dist
// Copies the files to the /dist folder for distributon as simple theme
gulp.task('dist', ['clean-dist'], function() {
    gulp.src(['*','**/*','!rundev.bat','!rundist.bat','!node_modules','!node_modules/**','!src','!src/**','!dist','!readme.txt','!README.md','!package.json','!package-lock.json','!gulpfile.js','!CHANGELOG.md'])
    .pipe(gulp.dest('dist/'))
});

// Deleting any file inside the /src folder
gulp.task('clean-dist', function () {
  return del(['dist/**/*',]);
});
