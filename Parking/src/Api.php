<?php

namespace App;

use App\Parking\Parking;
use Exception;

class Api
{
    protected Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function createParking($volume): Parking
    {
        $id = $this->repository->genID();

        $parking = new Parking($id, $volume);

        $this->saveParking($parking);

        return $parking;
    }

    /**
     * @throws ApiException
     */
    public function getParking($id)
    {
        try {
            $response = new Response($this->repository->getOne($id));
        } catch(Exception $e) {
            throw new ApiException("ApiException", 001, $e);
        }

        return $response;
    }

    /**
     * @throws Exception
     */
    public function getAllParking()
    {
        try {
            $response = new Response($this->repository->getAll());
        } catch(Exception $e) {
            throw new ApiException("ApiException", 002, $e);
        }

        return $response;
    }

    public function deleteParking($id)
    {
        return $this->repository->delete($id);
    }

    public function park($id, $class_name, $vin)
    {
        $class_name = "App\\Parking\\" . $class_name;

        if (!class_exists($class_name)) {
            throw new Exception("Такого типа нет");
        }

        $auto = new $class_name($vin);

        $parking = $this->repository->getOne($id);

        $parking->park($auto);

        $this->saveParking($parking);

        $response = new Response($parking);

        return $response;
    }

    public function unPark($id, $vin)
    {
        $parking = $this->repository->getOne($id);

        $parking->unPark($vin);

        $this->saveParking($parking);

        $response = new Response($parking);

        return $response;
    }

    function saveParking(Parking $parking)
    {
        $this->repository->save($parking);
    }
}