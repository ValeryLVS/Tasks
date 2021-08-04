<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', dirname(__DIR__));


use app\engine\Db;
use app\engine\Request;
use app\model\repositories\UserRepository;

return [
    'TEMPLATES_DIR' => dirname(__DIR__) . "/views/",
    'CONTROLLER_NAMESPACE' => 'app\controllers\\',
    'ROOT' => $_SERVER['DOCUMENT_ROOT'],
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'test',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'userRepository' => [
            'class' => UserRepository::class
        ],
    ]
];