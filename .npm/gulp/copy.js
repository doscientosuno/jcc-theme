import path from 'path'

export default function (gulp, plugins, args, config, taskTarget, browserSync) {
  let dirs = config.directories
  let dest = path.join(taskTarget)

  // Copy
  gulp.task('copy', ['templates', 'font-awesome'], () => {
    return gulp.src([
      path.join(dirs.source, '**/*'),
      '!' + path.join(dirs.source, '{**/\_*,**/\_*/**}')
    ])
    .pipe(plugins.changed(dest))
    .pipe(gulp.dest(dest))
  })

  gulp.task('templates', () => {
    return gulp.src([
      path.join(dirs.source, dirs.templates, '**/*')
    ])
    .pipe(plugins.changed(dest))
    .pipe(gulp.dest(dest))
  })

  gulp.task('font-awesome', () => {
    return gulp.src('node_modules/font-awesome/fonts/*')
    .pipe(gulp.dest(dest + 'fonts/'))
  })
}
