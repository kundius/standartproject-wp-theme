const gulp = require('gulp')
const babel = require('gulp-babel')
const postcss = require('gulp-postcss')
const terser = require('gulp-terser')
const sync = require('browser-sync')
const imagemin = require('gulp-imagemin')
const environments = require('gulp-environments')
const concat = require('gulp-concat')
const autoprefixer = require('autoprefixer')
const tailwindcss = require('tailwindcss')
const csso = require('postcss-csso')
const sass = require('gulp-sass')
const nunjucks = require('gulp-nunjucks-html')

const development = environments.development
const production = environments.production

// Styles

const styles = () => {
  const plugins = [
    autoprefixer(),
    tailwindcss({
      purge: {
        enabled: production(),
        content: [
          'src/**/*.html',
          'src/**/*.js',
          '**/*.php'
        ]
      }
    })
  ]
  if (production()) {
    plugins.push(csso())
  }
  return gulp.src('src/styles/index.scss', {
    base: 'src'
  })
    .pipe(sass())
    .pipe(postcss(plugins))
    .pipe(gulp.dest('dist'))
    .pipe(sync.stream())
}

exports.styles = styles

// Scripts

const scripts = () => {
  return gulp.src([
    'node_modules/micromodal/dist/micromodal.min.js',
    'src/scripts/improve-focus.js',
    'src/scripts/drawer.js',
    'src/scripts/index.js'
  ], {
    base: 'src'
  })
    .pipe(concat('scripts/index.js'))
    .pipe(babel({
      presets: ['@babel/preset-env']
    }))
    .pipe(production(terser()))
    .pipe(gulp.dest('dist'))
    .pipe(sync.stream())
}

exports.scripts = scripts

// Fonts

const fonts = () => {
  return gulp.src('src/fonts/**/*', {
      base: 'src'
    })
    .pipe(gulp.dest('dist'))
    .pipe(sync.stream({
      once: true
    }))
}

exports.fonts = fonts

// Html

const html = () => {
  return gulp.src('src/html/*.html', {
      base: 'src'
    })
    .pipe(nunjucks({
      searchPaths: ['src/html']
    }))
    .pipe(gulp.dest('dist'))
    .pipe(sync.stream({
      once: true
    }))
}

exports.html = html

// Images

const images = () => {
  return gulp.src('src/images/**/*', {
      base: 'src'
    })
    // .pipe(production(imagemin()))
    .pipe(gulp.dest('dist'))
    .pipe(sync.stream({
      once: true
    }))
}

exports.images = images

// Server

const server = () => {
  sync.init({
    ui: false,
    notify: false,
    server: {
      baseDir: 'dist'
    }
  })
}

exports.server = server

// Watch

const watch = () => {
  gulp.watch('src/styles/**/*', gulp.series(styles))
  gulp.watch('src/scripts/**/*', gulp.series(scripts))
  gulp.watch('src/fonts/**/*', gulp.series(fonts))
  gulp.watch('src/html/**/*', gulp.series(html))
  gulp.watch('src/images/**/*', gulp.series(images))
}

exports.watch = watch

// Build

exports.build = gulp.series(
  gulp.parallel(
    styles,
    scripts,
    fonts,
    html,
    images
  )
)

// Default

exports.default = gulp.series(
  gulp.parallel(
    styles,
    scripts,
    fonts,
    html,
    images
  ),
  gulp.parallel(
    watch,
    server
  )
)
