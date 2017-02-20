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
    'themeLTE': 'resources/assets/themeLTE',
    'plugins': 'resources/assets/plugins'
};

elixir((mix) => {
    mix.sass([
            'laravel-5.3.scss'
        ],
        'public/css/laravel-5.3.css'
    )
        // css libraries
        .styles([
            '/bootstrap.min.css',
            '/font-awesome.min.css',
            '/AdminLTE.css',
            '/skin-blue.min.css',
        ], 'public/css/libraries.css')

        // css
        .copy(paths.assetsCss + '/animate.min.css', 'public/css/animate.min.css')

        // js libraries
        .scripts([
            'jquery.1.11.1.js',
            'bootstrap.min.js',
            'LTE.app.min.js',
        ], 'public/js/libraries.js')

        // js
        .copy(paths.assetsJs + '/laravel-5.3.js', 'public/js/laravel-5.3.js')
        .copy(paths.assetsJs + '/sort_category.js', 'public/js/sort_category.js')

        // plugin
        .copy(paths.plugins, 'public/plugins')

       .webpack('app.js');
});
