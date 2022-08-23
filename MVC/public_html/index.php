<?php
session_start();

use app\engine\Autoload;
use app\engine\App;

$config = include realpath('../config/config.php');

include realpath('../engine/Autoload.php');

spl_autoload_register([new Autoload(), 'loadClass']);

App::call()->run($config);