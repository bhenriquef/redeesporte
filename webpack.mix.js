const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .postCss("resources/css/register/style.css", "public/css/register")
    .postCss("resources/css/login/style.css", "public/css/login")
    .postCss("resources/css/dashboard/style.css", "public/css/dashboard")
    .js("resources/js/eventos/index.js", "public/js/eventos")
    .js("resources/js/geral.js", "public/js")
    .js("resources/js/despesas/index.js", "public/js/despesas")
    .js(
        "resources/js/plugins/jquery/jquery.mask.min.js",
        "public/js/plugins/jquery"
    );
