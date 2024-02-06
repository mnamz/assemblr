<?php 

require_once __DIR__ . '/vendor/autoload.php';

use Assemblr\Mix;
use Assemblr\PackageJson;
use Assemblr\Util\Zip;

(new Mix)();
(new PackageJson(new Mix))();
(new Zip)();

echo "\n" . 'Build process completed';