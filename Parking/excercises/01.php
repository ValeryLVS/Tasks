<?php

use App\Parking\Parking;

require_once __DIR__ . '/../vendor/autoload.php';


try {
    $parking = new Parking(10);

    $volume = $parking->getVolume();

    echo $volume;

} catch (Exception $e) {

    echo $e->getMessage();
}