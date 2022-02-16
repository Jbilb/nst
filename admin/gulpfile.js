// LOCALHOST FOLDER NAME
//var localhostPath = '/folder-name-in-htdocs/app/index.php'
var localhostPath = '/doncamillo-restaurants.fr/admin/app/index.php';
var localhostProxy= "localhost";
// BASE
var gulp        = require('gulp');
var watch       = require('gulp-watch');
// SYNC
var browserSync = require('browser-sync').create();
var reload      = browserSync.reload;
// COMPRESSOR
var uglify      = require('gulp-uglify');
var cleanCSS    = require('gulp-clean-css');
var imagemin    = require('gulp-imagemin');
// SASS
var sass         = require('gulp-sass');
var sourcemaps   = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
// TOOLS
var rename      = require("gulp-rename");
var gulpif      = require('gulp-if');
var useref      = require('gulp-useref');
var run         = require('gulp-run');
var del         = require('del');
var fs          = require('fs');
// PATH
var appPath             = './app/';
var uploadsPath         = './uploads/';
var prodPath            = '../app/admin-mag/';
var prodUploadPath      = '../app/uploads/';
var sassPath            = appPath + 'sass/';
var gentelellaPath      = './src/';
var bootstrapFontPath   = appPath + 'bower_components/bootstrap/fonts/';
var fontawesomePath     = appPath + 'bower_components/font-awesome/';
var tinymcePath         = appPath + 'bower_components/tinymce/';
// VARIABLES
var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'expanded'
};
var autoprefixerOptions = {
  browsers: [
  "Android 2.3",
  "Android >= 4",
  "Chrome >= 20",
  "Firefox >= 24",
  "Explorer >= 8",
  "iOS >= 6",
  "Opera >= 12",
  "Safari >= 6"
  ]
};


//-----------------------------------------------------------------------
// GULP INIT     
//-----------------------------------------------------------------------

gulp.task('gentelella-files', function(){
    
    fs.stat(appPath+'js/gentelella/', function(err, stat) {
        if(err != null) {
            gulp
                .src(gentelellaPath+'/js/helpers/**')
                .pipe(gulp.dest(appPath+'js/gentelella/helpers'))
            ;
        }
    });
    
    fs.stat(appPath+'sass/gentelella/', function(err, stat) {
        if(err != null) {
            gulp
                .src(gentelellaPath+'/scss/**')
                .pipe(gulp.dest(sassPath+'/gentelella/'))
            ;
        }
    });
    
});


gulp.task('bootstrap-icons', function(){
    
    fs.stat(appPath+'/fonts/glyphicons-halflings-regular.eot', function(err, stat) {
        if(err != null) {
    
            return gulp
            .src(bootstrapFontPath+'glyphicons-halflings-regular.*')
            .pipe(gulp.dest(appPath+'fonts/'));
            ;
        }
    });
    
});


gulp.task('fontawesome-sass', function(){

    fs.stat(sassPath+'font-awesome/', function(err, stat) {
        if(err != null) {
    
            return gulp
            .src(fontawesomePath+'scss/*')
            .pipe(gulp.dest(appPath+'sass/font-awesome/'));
            ;
        }
    });
    
});

gulp.task('fontawesome-icons', function(){
    
    fs.stat(appPath+'/fonts/fontawesome-webfont.eot', function(err, stat) {
        if(err != null) {
    
            return gulp
            .src(fontawesomePath+'fonts/fontawesome-webfont.*')
            .pipe(gulp.dest(appPath+'fonts/'));
            ;
        }
    });
    
});

gulp.task('tinymce', function(){ 
   gulp
        .src(tinymcePath+'tinymce.js')
        .pipe(gulp.dest(appPath+'js/tinymce/'))
   ;
   gulp
        .src(tinymcePath+'plugins/**/*')
        .pipe(gulp.dest(appPath+'js/tinymce/plugins/'))
   ;
   gulp
        .src(tinymcePath+'skins/**/*')
        .pipe(gulp.dest(appPath+'js/tinymce/skins/'))
   ;
   gulp
        .src(tinymcePath+'themes/**/*')
        .pipe(gulp.dest(appPath+'js/tinymce/themes/'))
    ;
});

gulp.task('init', ['gentelella-files','bootstrap-icons', 'fontawesome-sass', 'fontawesome-icons','tinymce']);


//-----------------------------------------------------------------------
// SASS CONVERSION     
//-----------------------------------------------------------------------


gulp.task('sass', function(){
    return gulp
    .src(sassPath+'app.scss')
    .pipe(sourcemaps.init())
    .pipe(sass(sassOptions).on('error', sass.logError))
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(appPath+'css'))
    .pipe(browserSync.stream())
    ;
});


//-----------------------------------------------------------------------
// GULP SERVE
//-----------------------------------------------------------------------


gulp.task('serve', ['sass'], function () {
    browserSync.init({
     proxy: localhostProxy,
     startPath: localhostPath
    });
    gulp.watch(appPath+'sass/**/*.scss',['sass']);
    gulp.watch(appPath+'css/**/*.css').on('change', browserSync.reload);
    gulp.watch(appPath+'js/*.js').on('change', browserSync.reload);
    gulp.watch(appPath+'**/*.{html,php}').on('change', browserSync.reload);
    watch(appPath+'img/**/*').on('change', browserSync.reload);
    watch(appPath+'fonts/**/*').on('change', browserSync.reload);
    watch(appPath+'sass/**/*').on('change', browserSync.reload);
    //watch(appPath+'**/*', '!post/**/*').on('change', browserSync.reload);
});


//-----------------------------------------------------------------------
// GULP BUILD
//-----------------------------------------------------------------------


// Delete all images in /prod/img/ for clean
gulp.task('step1-clean', function () {
    del([prodPath]).then(paths => {
        console.log('Deleted files and folders:\n', paths.join('\n'));
    });
});


// Copy files (html or php files, fonts, favicon)
gulp.task('step2-copy', function () {
    return gulp
        .src([
            appPath+'**/*.*',
            appPath+'.htaccess',
            '!'+appPath+'bower_components/**/*',
            '!'+appPath+'**/*.{html,php}',
            '!'+appPath+'css/**/*',
            '!'+appPath+'js/tinymce/tinymce.js',
            '!'+appPath+'js/gentelella/**/*',
            '!'+appPath+'js/app.js',
            '!'+appPath+'sass/**/*'
        ])
        .pipe(gulp.dest(prodPath))
    ;

});

// Minify images
gulp.task('step3-imagemin', function () {

    return gulp
        .src(appPath+'img/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest(prodPath+'img/'))
    ;

});


// Useref to compress all css and js files (presents in build tag)
gulp.task('step4-useref', function () {
    return gulp
        .src([appPath+'**/*.{html,php}', '!'+appPath+'bower_components/**/*'])
        .pipe(useref())
        .pipe(gulpif('*.js', uglify()))
        .pipe(gulpif('*.css', cleanCSS()))
        .pipe(gulp.dest(prodPath))
    ;
});


// Copy files (html or php files, fonts, favicon)
gulp.task('step5-copy-uploads', function () {
    return gulp
        .src([
            uploadsPath+'**/*.*'
        ])
        .pipe(gulp.dest(prodUploadPath))
    ;

});


gulp.task('build', ['step1-clean', 'step2-copy', 'step3-imagemin', 'step4-useref','step5-copy-uploads']);