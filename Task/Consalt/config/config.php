<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', dirname(__DIR__));


use app\engine\Db;
use app\engine\Request;
use app\model\repositories\ClientsRepository;
use app\model\repositories\OrdersRepository;
use app\model\repositories\ProvidersRepository;
use app\model\repositories\ReasonRepository;
use app\model\repositories\TownRepository;
use app\model\repositories\ServicesRepository;

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
            'database' => 'testphp',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'townRepository' => [
            'class' => TownRepository::class
        ],
        'clientsRepository' => [
            'class' => ClientsRepository::class
        ],
        'providersRepository' => [
            'class' => ProvidersRepository::class
        ],
        'servicesRepository' => [
            'class' => ServicesRepository::class
        ],
        'ordersRepository' => [
            'class' => OrdersRepository::class
        ],
        'reasonRepository' => [
            'class' => ReasonRepository::class
        ],
    ]
];