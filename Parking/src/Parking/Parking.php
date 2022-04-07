<?php

namespace App\Parking;

use Exception;
use InvalidArgumentException;

class Parking
{
    protected string $id;
    protected int $volume;
    protected array $cars = [];

    /**
     * @throws InvalidArgumentException
     */
    public function __construct(string $id, int $volume)
    {
        if (($volume <= 0)) {
            throw new InvalidArgumentException("Парковка должна быть числом и > 0");
        }

        $this->id = $id;
        $this->volume = $volume;
    }

    public function getCars(): array
    {
        return $this->cars;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getVolume(): int
    {
        return $this->volume;
    }

    /**
     * @throws Exception
     */
    public function park(Auto $auto): bool
    {

        $vin = $auto->getVin();

        if ($this->volume <= count($this->cars)) {
            throw new Exception("Мест больше нет");
        }

        if (empty($this->cars)) {
            array_push($this->cars, $auto);

            return true;
        }

        foreach ($this->cars as $key => $item) {
            $parkingCarVin = $item->getVin();

            if ($vin == $parkingCarVin) {
                throw new Exception("Авто с таким vin номером уже есть");
            }
        }

        array_push($this->cars, $auto);

        return true;
    }

    /**
     * @throws Exception
     */
    public function unPark($carVin): bool
    {
        foreach ($this->cars as $key => $item) {

            $parkingCarVin = $item->getVin();

            if ($carVin == $parkingCarVin) {
                unset($this->cars[$key]);
                return true;
            }
        }

        throw new Exception("Авто с таким VIN не найден");
    }
}