<?php

use App\Api;
use App\Repository;

try {
    unset($argv[0]);

    require_once __DIR__ . '/config/config.php';
    require_once __DIR__ . '/vendor/autoload.php';

    $app = new Api(new Repository(DATA_DIR));
    $method = array_shift($argv);

    if (method_exists($app, $method)) {
        $park = call_user_func_array([$app, $method], $argv);

        echo json_encode($park->response(), JSON_UNESCAPED_UNICODE |JSON_PRETTY_PRINT);
    } else {
        echo 'Такого метода нет';
    }

} catch (Exception $e) {
    echo $e->getMessage();
}