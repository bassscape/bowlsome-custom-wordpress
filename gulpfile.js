var gulp = require('gulp'),
    gulpLoadPlugins = require('gulp-load-plugins'),
    browserSync = require('browser-sync').create(),
    del = require('del'),
    runSequence = require('run-sequence'),
	clean = require('gulp-clean'),
	gutil = require('gulp-util'),
    jshint = require('gulp-jshint'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    sass = require('gulp-sass'),
    less = require('gulp-less'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    cleanCSS = require('gulp-clean-css'),
    rename = require('gulp-rename'),
    sourcemaps = require('gulp-sourcemaps'),
    cssLonghand = require('gulp-css-longhand'),
    compose = require('docker-compose'),
    $ = gulpLoadPlugins(),
    reload = browserSync.reload;

var project = {
	name: 'bowlsome'
};
var path = {
	theme: './app/assets/themes/' + project.name + '/',
	source: './app/assets/themes/' + project.name + '/src/',
	build: './app/assets/themes/' + project.name + '/build/',
	bower: './bower_components/',
	npm: './node_modules/'
};
var production = {
	scripts: './app/assets/themes/' + project.name + '/scripts/',
	css: './app/assets/themes/' + project.name + '/css/'
};


gulp.task('composer', () => {
    $.composer();
});

gulp.task('docker', () => {
  compose.up({ cwd: './', log: true })
    .then(
      () => { console.log('done')},
      err => { console.log('something went wrong:', err.message)}
    );
});


// Compile SASS into the build directory
gulp.task('styles_build', function () {
    gulp.src([
    	//path.npm + 'susy/sass',
    	path.npm + 'owl.carousel/src/scss/owl.carousel.scss',
    	//path.npm + 'owl.carousel/src/scss/owl.theme.default.scss',
    	path.source + 'style.scss',
    ])
    //.pipe(filter)
    .pipe(sass().on('error', sass.logError))
    //.pipe(sass({style: 'expanded', includePaths: [ './sass' ], errLogToConsole: true }))
    .pipe(concat('style.css'))
    .pipe(rename({suffix: '.build'}))
    .pipe(gulp.dest(path.build))
    ;
});
// Minify everything but the almost flat uikit theme
gulp.task('styles_minify', function () {
	return gulp.src([
		//'!' + path.build + 'uikit_theme.build.css',
		path.build + '*.css',

	])
    //.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9'))
    //.pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(concat('style.css'))
    //.pipe(rename({suffix: '.min'}))
    .pipe(cssLonghand())
    .pipe(gulp.dest(path.theme))
    //.pipe(livereload())
    ;
});


gulp.task('js_concat', function(){
    return gulp.src([
    	path.source + 'js.js',
    	path.source + 'flowtype.js',
    	//path.source + 'jquery.vticker.js',
    	//path.bower + 'imagesloaded/imagesloaded.pkgd.min.js',
    	//path.bower + 'isotope/dist/isotope.pkgd.min.js',
    	path.npm + 'owl.carousel/dist/owl.carousel.js',
    	//path.npm + 'jquery-lazyload/jquery.lazyload.js',
    	path.npm + 'jquery-match-height/jquery.matchHeight.js'
    ])
    .pipe(concat('js.js'))
    .pipe(rename({suffix: '.build'}))
    .pipe(gulp.dest(path.build))
    ;
});
gulp.task('js_uglify', function(){
	return gulp.src([
		path.build + '*.js'
	])
    .pipe(rename('js_min.js'))
    //.pipe(rename({suffix: '.min'}))
    //.pipe(uglify())
    .pipe(gulp.dest(production.scripts))
    ;
});


// Create local wp-config-local.php (overwritten if exists) file using .env.local
gulp.task('config_local', () => {
  return gulp.src('./.env.local')
    .pipe($.rename('wp-config-local.php'))
    .pipe(gulp.dest('./app'));
});

gulp.task('setup', () => {
  //runSequence(['config_local'],['composer'])
  runSequence(['composer'])
});


gulp.task('serve', () => {
  runSequence(['docker','styles_build','styles_minify','js_concat','js_uglify'], () => {
    browserSync.init({
      notify: false,
      port:4000,
      proxy: 'localhost:4001'
    });

	gulp.watch(path.source + '*.scss', ['styles_build']);
	gulp.watch(path.build + '**/*.css', ['styles_minify']).on('change', browserSync.reload);
	gulp.watch(path.source + '**/*.js', ['js_concat']);
	gulp.watch(path.build + '**/*.js', ['js_uglify']).on('change', browserSync.reload);
	gulp.watch(path.theme + '/**/*.{php,html}').on('change', browserSync.reload);

  });
});

gulp.task('default', [ 'serve' ]);
