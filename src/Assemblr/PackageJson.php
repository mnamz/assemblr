<?php 

namespace Assemblr;

use Assemblr\Util\File;
use Assemblr\Util\Content;

class PackageJson
{
    private $data = [];
    private $filename = 'package.json';
    private $bundler = '';

    public function __construct(object $bundler)
    {
        $this->bundler = $bundler->getNameOfClass();
    }

    public function __invoke()
    {
        (new File($this->filename));
       
        $this->_base();
        $this->_whichBundler();
        $this->_convertDataToJson();

        (new Content) ($this->filename, $this->data);
    }

    private function _base() : array
    {
        // default
        $this->data = $this->data + [
            "name" => "Your Package Name",
            "version" => "1.0.0",
            "description" => "Your package description",
            "author" => "Your Name",
            "license" => "MIT",
            "scripts" => []
        ];

        return $this->data;
    }

    private function _whichBundler() : array
    {
        switch ($this->bundler) {
            case 'Mix':
                $this->data['scripts'] = $this->data['scripts'] + [
                    "dev" => "npm run development",
                    "development" => "mix",
                    "watch" => "mix watch",
                    "watch-poll" => "mix watch -- --watch-options-poll=1000",
                    "hot" => "mix watch --hot",
                    "prod" => "npm run production",
                    "production" => "mix --production"
                ];

                return $this->data;
                break;
            
            default:
                break;
        }
    }

    private function _convertDataToJson()
    {
        $this->data = json_encode($this->data, JSON_PRETTY_PRINT);

        return $this->data;
    }
}