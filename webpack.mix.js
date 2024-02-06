const mix = require('laravel-mix') 

mix.sass('resources/sass/app.scss', 'css/')
	.js('resources/js/app.js', 'js/');