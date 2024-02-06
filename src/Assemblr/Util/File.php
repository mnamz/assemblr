<?php

namespace Assemblr\Util;

class File
{   
    private $filename = '';

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function __invoke() : void
    {
        $this->_fileExist($this->filename);
    }

    private function _fileExist($filename) : void
    {
        (!file_exists($filename)) 
            ? $this->_createFile($filename) 
            : $this->_recreateFile($filename);
    }

    private function _createFile($filename) : void
    {
        $file = fopen($filename, "w");

        if ($file) 
            fclose($file);
        

        echo 'Failed to create the file';
    }

    private function _recreateFile($filename) : void
    {
        $status = $this->_deleteFile($filename);
        
        if ($status) 
            $this->_createFile($filename);
            
        echo 'Failed to recreate the file';
    }

    private function _deleteFile($filename) : bool
    {
        return (unlink($filename)) ? true : false;
    }
}
