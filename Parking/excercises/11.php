<?php

use App\Api;
use App\Repository;

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../vendor/autoload.php';

try {
    $app = new Api(new Repository(DATA_DIR));

    //Создаем парковку
    $parkingOne = $app->createParking(10);

    //Создание ТС и постанвока ТС на парковку
    //$app->park($parkingOne->getId(), 'Car', 'A1-car');
    //$app->park($parkingOne->getId(), 'Bike', 'A12-car');

    //Выгнать ТС с парквоки
    //$app->unPark($parkingOne->getId(), 'A1-car');

    //Получи все парковки
    //$app->getAllParking();

    //Получить парковку по id
    //$app->getParking($parkingOne->getId());
    $parkArr = new \App\Response($parkingOne);

    var_dump($parkArr);
    var_dump($parkArr->response());



    //Удалить парковку по id
    //$app->deleteParking($parkingOne->getId());

} catch (Exception $e) {
    echo $e->getMessage();
}
