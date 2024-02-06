<?php 

namespace Assemblr\Util;

class Download 
{
    public function __invoke(string $filepath) : void
    {
        $this->_setHeader($filepath);
        $this->init($filepath);
    }

    private function _setHeader(string $filepath) : void
    {
        // Define the headers for the download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
    }

    private function init(string $filepath) : void
    {
        // Read the file and output it to the browser
        readfile($filepath);

        exit;
    }
}