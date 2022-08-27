const {src, dest, watch, parallel} = require("gulp");

// CSS
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');

// Images
const cache = require('gulp-cache');
const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');
const avif = require('gulp-avif');
const ico = require('gulp-to-ico');

// JavaScript
const terser = require('gulp-terser-js');
const { devNull } = require("os");

// FUNTIONS

// Run compilation of the scss files also minified
function css(done) {
    src('src/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(plumber() )
        .pipe(sass())
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sourcemaps.write('.'))
        .pipe(dest("build/css"));

    done();
};

function css1(done) {
    src('src/scss/**/*.scss')
        .pipe(plumber() )
        .pipe(sass())
        .pipe(dest("build/css"));

    done();
};

// Function to transform images optimization
function imagenes(done){
    const options = {
        optimizationLevel: 3
    }

    src( "src/img/**/*.{png,jpg}")
        .pipe(cache( imagemin(options) ) )
        .pipe(dest("build/img") )

    done();
};

// Transform images to .webp
function versionWebp(done){
    const options = {
        quality: 50
    };

    src("src/img/**/*.{png,jpg}")
        .pipe(webp(options) )
        .pipe(dest("build/img"));

    done();
};

// Transform images to .avif
function versionAvif(done){
    const options = {
        quality: 50
    };

    src("src/img/**/*.{png,jpg}")
        .pipe(avif(options) )
        .pipe(dest("build/img"));

    done();
};

// Transform to ico
function versionIco(done){
    src("src/img/favicon/*.{png,jpg}")
        .pipe(ico( 'favicon.ico', { resize: true, sizes: [16, 24, 32, 64] } ) )
        .pipe(dest("build/favicon"))

    done();
}

// Function for JavaScript also compilation & minified
function JavaScript(done){
    src("src/js/**/*.js")
        .pipe(sourcemaps.init() )
        .pipe( terser() )
        .pipe(sourcemaps.write())
        .pipe(dest("build/js"));

    done();
};

// Function Watch to see changes and dontstop the compilation
function dev(done) {
    watch("src/scss/**/*.scss", css)
    watch("src/js/*.js", JavaScript)

    done()
};

// Call functions

exports.css = css;
exports.js = JavaScript;
exports.imagenes = imagenes;
exports.versionWebp = versionWebp;
exports.versionAvif = versionAvif;
exports.versionIco = versionIco;
exports.dev = parallel( imagenes, versionWebp, versionAvif, versionIco, JavaScript, css, dev);

