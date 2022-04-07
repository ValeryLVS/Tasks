<?php

namespace App;


use RuntimeException;

class Response
{
    protected $parking;

    public function __construct($parking)
    {

        $this->parking = $parking;
    }

    public function response(): array
    {
        if (gettype($this->parking) == 'object') {
            $arr = $this->createArray($this->parking);
        } else {
            foreach ($this->parking as $key => $object) {

                if (gettype($object) == 'array') {
                    throw new RuntimeException("Передан не верный тип данных");
                }

                $arr[] = $this->createArray($object);
            }
        }

        return $arr;
    }

    public function createArray($object): array
    {
        $arr['id'] = $object->getId();
        $arr['volume'] = $object->getVolume();
        $arr['cars'] = [];

        $cars = $object->getCars();

        foreach ($cars as $value) {
            $typeCar = explode(DIRECTORY_SEPARATOR, get_class($value));
            $typeCar = end($typeCar);

            $arr['cars'][] = [
                'type' => $typeCar,
                'vin' => $value->getVin(),
            ];
        }

        return $arr;
    }

}