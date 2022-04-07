<?php

use App\Parking\Parking;

require_once __DIR__ . '/../vendor/autoload.php';


try {
    $parking = new Parking(-20);

    $volume = $parking->getVolume();

    echo $volume;

} catch (Exception $e) {

    echo $e->getMessage();
}

try {
    $parking = new Parking('asd');

    $volume = $parking->getVolume();

    echo $volume;

} catch (Exception $e) {

    echo $e->getMessage();
}
