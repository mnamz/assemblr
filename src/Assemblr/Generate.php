<?php 

namespace Assemblr;

class Generate
{   
    private $data = '';

    
    /**
     * Web Framework
     */

    public function laravel()
    {
        $this->data = "const mix = require('laravel-mix') \n\n";
        $this->data .= "mix.sass('resources/sass/app.scss', 'css/')\n";
        $this->data .= "\t.js('resources/js/app.js', 'js/');";

        return $this->data;
    }

    public function wordpress()
    {

    }

    public function custom(string $filename, string $path)
    {

    }

    /**
     * Css Framework
     */

    public function tailwind()
    {

    }

    public function bootstrap()
    {

    }

    /**
     * Javascript Framework
     */

    public function vue()
    {

    }

    public function react()
    {

    }

    /**
     * Plugin
     */


    public function purgeCss()
    {

    }

    public function imageMin()
    {

    }
}
