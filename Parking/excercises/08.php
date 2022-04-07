<?php

use App\Api;

require_once __DIR__ . '/../vendor/autoload.php';


try {
    Api::createParking(10);

} catch (Exception $e) {

    echo $e->getMessage();
}
