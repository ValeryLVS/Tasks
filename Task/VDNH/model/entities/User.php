<?php


namespace app\model\entities;

use app\model\Model;


class User extends Model
{
    protected $name;
    protected $patronymic;
    protected $surname;
    protected $date_of_birth;


    protected $props = [
        'name' => false,
        'patronymic' => false,
        'surname' => false,
        'date_of_birth' => false,
    ];

    public function __construct($name = null, $patronymic = null, $surname = null, $date_of_birth = null)
    {
        $this->name = $name;
        $this->patronymic = $patronymic;
        $this->surname = $surname;
        $this->date_of_birth = $date_of_birth;
    }
}