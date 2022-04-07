<?php

namespace App;

use Exception;

class Repository
{
    protected string $patch;

    public function __construct(string $patch)
    {
        $this->patch = $patch;
    }

    public function save($parking)
    {
        $id = $parking->getId();

        return file_put_contents($this->patch . $id, serialize($parking));
    }

    /**
     * @throws Exception
     */
    public function getOne($id)
    {
        if (!file_exists($this->patch . $id)) {
            throw new Exception('Парковка не найдена');
        }

        return unserialize(file_get_contents($this->patch . $id));
    }

    public function getAll()
    {
        $allPark = [];

        $files = scandir($this->patch, 1);

        foreach ($files as $file) {
            if (($file !== '.') && ($file !== '..'))
                $allPark[] = unserialize(file_get_contents($this->patch . $file));
        }

        return $allPark;
    }

    /**
     * @throws Exception
     */
    public function delete($id): bool
    {
        if (!file_exists($this->patch . $id)) {
            throw new Exception('При удалениее парковка, парковка не найдена');
        }

        return unlink($this->patch . $id);
    }

    public function genID(): string
    {
        $id = uniqid('parking_') . '.json';

        if (file_exists($id . '.json')) {
            return $this->genID();
        }

        return $id;
    }
}