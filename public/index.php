<?php
header('Access-Control-Allow-Origin: *');

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);
define('VIEW', APP . 'View' . DIRECTORY_SEPARATOR);

require ROOT . 'vendor/autoload.php';
require APP . 'config/config.php';


use Mini\Core\Application;

$app = new Application();
