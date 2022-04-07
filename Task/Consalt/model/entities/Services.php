<?php


namespace app\model\entities;

use app\model\Model;

class Services extends Model
{
    protected $id;
    protected $provider;
    protected $service;

    protected $props = [
        'provider' => false,
        'service' => false,
    ];

    public function __construct($provider = null, $service = null)
    {
        $this->provider = $provider;
        $this->service = $service;
    }
}