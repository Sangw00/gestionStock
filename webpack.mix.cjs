const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .babelConfig({
       presets: [
           '@babel/preset-env',
           '@babel/preset-react'
       ]
   });
                                                                                                                                                                                                                                                                                                                          