<?php


namespace app\model\entities;


use app\model\Model;

class Providers extends Model
{
    protected $id;
    protected $provider;
    public $other;

    protected $props = [
        'provider' => false,
    ];

    public function __construct($id = null, $provider = null)
    {
        $this->id = $id;
        $this->provider = $provider;
    }
}