<?php

use App\Parking\Car;
use App\Parking\Parking;

require_once __DIR__ . '/../vendor/autoload.php';


try {
    //Создаю парковку
    $parking = new Parking(3);

    //Создаю авто с размером и vin номером
    $carOne = new Car(1, 'A121');
    $carTwo = new Car(1, 'A122');

    //Паркуем авто Первое и второе
    $parking->park($carOne);
    $parking->park($carTwo);

    $vinOne = $carOne->getVin();
    $vinTwo = $carTwo->getVin();
    //Первый авто уехал
    $parking->unPark($vinOne);
    $parking->unPark($vinTwo);


} catch (Exception $e) {

    echo $e->getMessage();
}