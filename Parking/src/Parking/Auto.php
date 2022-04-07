<?php

namespace App\Parking;

abstract class Auto
{
    protected const SIZE_AUTO = null;
    protected string $vin;

    public function __construct(string $vin)
    {
        $this->vin = $vin;
    }

    public function getSize()
    {
        return static::SIZE_AUTO;
    }

    public function getVin(): string
    {
        return $this->vin;
    }
}