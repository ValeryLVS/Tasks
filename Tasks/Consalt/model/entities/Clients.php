<?php


namespace app\model\entities;

use app\model\Model;


class Clients extends Model
{
    public $id;
    protected $town;
    protected $name;
    protected $address;
    protected $phone;
    protected $service;
    protected $additionally;

    protected $props = [
        'town' => false,
        'name' => false,
        'address' => false,
        'phone' => false,
        'service' => false,
        'additionally' => false,
    ];

    public function __construct($town = null, $name = null, $address = null, $phone = null, $service = null, $additionally = null)
    {
        $this->town = $town;
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->service = $service;
        $this->additionally = $additionally;
    }
}