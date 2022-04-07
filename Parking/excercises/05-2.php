<?php

use App\Parking\Car;
use App\Parking\Parking;

require_once __DIR__ . '/../vendor/autoload.php';


try {
    $parking = new Parking(3);

    $car = new Car(1);

    $volume = $parking->getVolume();

    $volume = $parking->addCarParking($car);
    var_dump($volume);  //true

    $volume = $parking->addCarParking($car);
    var_dump($volume); //true

    $volume = $parking->addCarParking($car);
    var_dump($volume); //true

    $volume = $parking->addCarParking($car);
    var_dump($volume); //false

} catch (Exception $e) {

    echo $e->getMessage();
}