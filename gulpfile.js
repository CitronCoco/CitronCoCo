// gulpfile.js
const gulp = require("gulp");
const sass = require("gulp-sass");
const minify = require("gulp-minify");

function style() {
    // Where should gulp look for the sass files?
    // My .sass files are stored in the styles folder
    // (If you want to use scss files, simply look for *.scss files instead)
    return (
        gulp
            .src("resources/public/sass/*.scss")
            // Use sass with the files found, and log any errors
            .pipe(sass())
            .on("error", sass.logError)
            // What is the destination for the compiled file?
            .pipe(gulp.dest("public/css"))
    );
}

exports.style = style;

function compress() {
    return (
        gulp.src("resources/public/js/*.js")
            .pipe(minify())
            .pipe(gulp.dest('public/js'))

    );
}

exports.compress = compress;

//******************  WATCH TASKS  **********************//
function watch() {
    gulp.watch('resources/public/sass/*.scss', style);
    gulp.watch('resources/public/js/*.js', compress);
}

exports.watch = watch;
