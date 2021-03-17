const mix = require('laravel-mix');
const path = require('path');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
            '@tela': path.resolve('resources/js/components/tela'),
            '@busca': path.resolve('resources/js/components/shared/busca'),
            '@lista': path.resolve('resources/js/components/shared/lista'),
            '@edicao': path.resolve('resources/js/components/shared/edicao'),
            '@form': path.resolve('resources/js/components/shared/form'),
            '@botao': path.resolve('resources/js/components/shared/botao'),
            '@select': path.resolve('resources/js/components/shared/select'),
            '@msg': path.resolve('resources/js/components/shared/mensagem'),
            '@api': path.resolve('resources/js/core/api'),
            '@functions': path.resolve('resources/js/core/functions'),
            '@helpers': path.resolve('resources/js/core/helpers')
        }
    }
})

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');