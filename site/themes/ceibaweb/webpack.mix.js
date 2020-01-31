let mix = require('laravel-mix');

require('laravel-mix-tailwind');

mix.js('src/js/ceibaweb.js', 'js')
  .js('src/js/contact.js', 'js')
  .sass('src/scss/ceibaweb.scss', 'css')
  .sourceMaps()
  .tailwind();