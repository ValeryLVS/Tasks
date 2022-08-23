<?php


namespace app\model\entities;

use app\model\Model;

class Town extends Model
{
    protected $id;
    protected $town;

    protected $props = [
        'town' => false,
    ];

    public function __construct($id = null, $town = null)
    {
        $this->id = $id;
        $this->town = $town;
    }
}