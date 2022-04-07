<?php

use App\Parking\Bike;
use App\Parking\Car;
use App\Parking\Parking;
use App\Parking\Truck;

require_once __DIR__ . '/../vendor/autoload.php';


try {
    $parking = new Parking(10);

    $carOne = new Car('A1-car');
    $bikeOne = new Bike('A1-bike');
    $truckOne = new Truck('A1-truck');

    $parking->park($carOne);
    $parking->park($bikeOne);
    $parking->park($truckOne);

    $parking->unPark($carOne->getVin());


} catch (Exception $e) {

    echo $e->getMessage();
}