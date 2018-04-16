let mix = require('laravel-mix');

require('laravel-mix-tailwind');

mix.js('src/js/jukung.js', 'js')
    .sass('src/scss/jukung.scss', 'css')
    .tailwind();