<?php


namespace app\model\entities;

use app\model\Model;

class Category extends Model
{
    protected $id;
    protected $slug;
    protected $name;
    protected $price;
    protected $info;
    protected $img;
    protected $other;

    protected $props = [
        'slug' => false,
        'name' => false,
        'price' => false,
        'info' => false,
        'img' => false,
        'other' => false
    ];


    public function __construct($slug = null, $name = null, $price = null, $info = null, $img = null, $other = null)
    {
        $this->slug = $slug;
        $this->name = $name;
        $this->price = $price;
        $this->info = $info;
        $this->img = $img;
        $this->other = $other;
    }
}