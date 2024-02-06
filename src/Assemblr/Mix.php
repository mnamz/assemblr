<?php 

namespace Assemblr;

use Assemblr\Util\File;
use Assemblr\Util\Content;
use Assemblr\Generate;

class Mix 
{
    private $filename = 'webpack.mix.js';

    public function __invoke()
    {
        (new File($this->filename));
        $generate = new Generate();

        $data = $generate->laravel();

        (new Content) ($this->filename, $data);
    }

    public function getNameOfClass() : string
    {
       return basename(static::class);
    }
}
