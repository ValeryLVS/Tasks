<?php


namespace app\model\entities;

use app\model\Model;

class Services extends Model
{
    protected $id;
    protected $category;
    protected $name;
    protected $price;

    protected $props = [
        'category' => false,
        'name' => false,
        'price' => false
    ];

    public function __construct( $category = null, $name = null, $price = null)
    {
        $this->category = $category;
        $this->name = $name;
        $this->price = $price;
    }
}