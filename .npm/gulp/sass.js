import path from 'path'
import autoprefixer from 'autoprefixer'

export default function (gulp, plugins, args, config, taskTarget, browserSync) {
  let dirs = config.directories
  let entries = config.entries
  let dest = path.join(taskTarget)
  let header = `/*
Theme Name: ` + config.theme.name + `
Theme URI: ` + config.theme.homepage + `
Author: ` + config.theme.author.name + `
Author URI: ` + config.theme.author.url + `
Description: ` + config.theme.description + `
Version: ` + config.theme.version + `
License: ` + config.theme.license.type + `
License URI: ` + config.theme.license.url + `
Tags: ` + config.theme.keywords + `
Text Domain: ` + config.theme.name + `
*/

`

  // Sass compilation
  gulp.task('sass', () => {
    gulp.src(path.join(dirs.source, dirs.styles, entries.css))
      .pipe(plugins.plumber())
      .pipe(plugins.sourcemaps.init())
      .pipe(plugins.sass({
        outputStyle: 'expanded',
        precision: 10,
        includePaths: [
          path.join(dirs.source, dirs.styles),
          path.join(dirs.source, dirs.modules)
        ]
      }).on('error', plugins.sass.logError))
      .pipe(plugins.postcss([autoprefixer({
        browsers: [
          'last 2 version',
          '> 5%',
          'safari 5',
          'ios 6',
          'android 4'
        ]
      })]))
      .pipe(plugins.header(header))
      .pipe(plugins.rename(function (path) {
        // Remove 'source' directory as well as prefixed folder underscores
        // Ex: 'src/_styles' --> '/styles'
        path.dirname = path.dirname.replace(dirs.source, '').replace('_', '')
        path.basename = 'style'
      }))
      .pipe(gulp.dest(dest))
      .pipe(plugins.rename(function (path) {
        path.basename = 'style.min'
      }))
      .pipe(plugins.minifyCss({ rebase: false }))
      .pipe(plugins.sourcemaps.write('./'))
      .pipe(gulp.dest(dest))
      .pipe(browserSync.stream({ match: '*.css' }))
  })
}
