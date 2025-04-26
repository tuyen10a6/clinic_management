const mix = require('laravel-mix');
let path = require('path');

let directory_asset = 'public/vendor/assets';
mix.setPublicPath(path.normalize(directory_asset));

let build_js = [
    {
        from: "/resources/assets/js/base/dashlite.js",
        to: "/js/dashlite.js"
    }
];

let build_scss = [
    {
        from: "/resources/assets/scss/base/dashlite.scss",
        to: "/css/dashlite.css",
    }
];

build_scss.map((index) => {
    let from = __dirname + index.from;
    let to = index.to;
    mix.sass(from, to).minify(directory_asset + to);
});

build_js.map((index) => {
    let from = __dirname + index.from;
    let to = index.to;
    if (Array.isArray(index.from)) {
        from = [];
        index.from.forEach(file => {
            from.push(__dirname + file);
        });
    }
    mix.js(from, to);
});

mix.options({
    processCssUrls: false
}).autoload({
    jquery: ['$', 'window.jQuery', 'jQuery'],
});

if (mix.inProduction()) {
    mix.version();
}
