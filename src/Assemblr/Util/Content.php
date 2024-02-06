<?php 

namespace Assemblr\Util;

class Content
{
    public function __invoke(string $filename, string $data)
    {
        $this->_write($filename, $data);
    }

    private function _write(string $filename, string $data) : void
    {
        if (file_put_contents($filename, $data) !== false ) return ;
    }
}