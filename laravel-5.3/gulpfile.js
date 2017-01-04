const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

var paths = {
    'assetsCss': 'resources/assets/css',
    'assetsJs': 'resources/assets/js',
    'themeLTE': 'resources/assets/themeLTE'
};

elixir((mix) => {
    mix.sass([
            'laravel-5.3.scss'
        ],
        'public/css/laravel-5.3.css'
    )
        .copy(paths.assetsCss + '/bootstrap.min.css', 'public/css/bootstrap.min.css')
        .copy(paths.themeLTE + '/css/font-awesome.min.css', 'public/css/font-awesome.min.css')
        .copy(paths.themeLTE + '/css/ionicons.min.css', 'public/css/ionicons.min.css')
        .copy(paths.themeLTE + '/css/AdminLTE.min.css', 'public/css/AdminLTE.min.css')
        .copy(paths.themeLTE + '/css/skins/skin-blue.min.css', 'public/css/skin-blue.min.css')
        .copy(paths.assetsCss + '/jquery.dataTables.min.css', 'public/css/jquery.dataTables.min.css')
        .copy(paths.assetsCss + '/select2.min.css', 'public/css/select2.min.css')
        .copy(paths.assetsCss + '/animate.min.css', 'public/css/animate.min.css')

        .copy(paths.themeLTE + '/js/jquery.1.11.1.js', 'public/js/jquery.1.11.1.js')
        .copy(paths.themeLTE + '/js/bootstrap.min.js', 'public/js/bootstrap.min.js')
        .copy(paths.themeLTE + '/js/LTE.app.min.js', 'public/js/LTE.app.min.js')
        .copy(paths.assetsJs + '/jquery.dataTables.min.js', 'public/js/jquery.dataTables.min.js')
        .copy(paths.assetsJs + '/laravel-5.3.js', 'public/js/laravel-5.3.js')
        .copy(paths.assetsJs + '/select2.full.min.js', 'public/js/select2.full.min.js')
        .copy(paths.assetsJs + '/bootstrap-notify.min.js', 'public/js/bootstrap-notify.min.js')
       .webpack('app.js');
});
