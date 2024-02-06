<?php 

namespace Assemblr\Util;

use ZipArchive;

class Zip
{   
    private $zip = null;
    private $zipFileName = 'webix.zip';

    public function __construct()
    {
        $this->zip = new ZipArchive();    
    }
   
    public function __invoke()
    {
        if ($this->zip->open($this->zipFileName, ZipArchive::CREATE) == TRUE) 
        {
            // Array of files to add to the ZIP archive
            $filesToAdd = array(
                'package.json',
                'webpack.mix.js'
            );

            // Loop through the array and add each file to the ZIP archive
            foreach ($filesToAdd as $fileToAdd) {
                $this->zip->addFile($fileToAdd, basename($fileToAdd));
            }

            // Close the ZIP archive
            $this->zip->close();

            echo "ZIP file '$this->zipFileName' has been created with multiple files.";
        } else {
            echo "Failed to create the ZIP file.";
        }
    }   
}