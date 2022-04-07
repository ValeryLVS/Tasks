<?php

use App\Api;
use App\Parking\Bike;
use App\Parking\Car;
use App\Parking\Truck;

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../vendor/autoload.php';

try {
    $parkingOne = Api::createParking(10);
    $parkingTwo = Api::createParking(13);

    $carOne = new Car('A1-car');
    $bikeOne = new Bike('A1-bike');
    $truckOne = new Truck('A1-truck');

    $parkingOne->park($carOne);
    $parkingOne->park($bikeOne);

    $parkingTwo->park($truckOne);

    //Сохранить парковку
    //Api::saveParking($parkingOne);

    //Получить парковку по id
    //Api::getParking($parkingOne->getId());

    //Получи все парковки у логина
    //Api::getAllParking();

    //Удалить парковку по id
    //Api::deleteParking($parkingOne->getId());

} catch (Exception $e) {
    echo $e->getMessage();
}
