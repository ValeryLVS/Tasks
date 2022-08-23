<?php


namespace app\model\entities;


class Orders extends \app\model\Model
{
    protected $id;
    protected $client_id;
    protected $provider_id;
    protected $reasons_id;

    protected $props = [
        'client_id' => false,
        'provider_id' => false,
        'reasons_id' => false,
    ];

    public function __construct($client_id = null, $provider_id = null, $reasons_id = null)
    {
        $this->client_id = $client_id;
        $this->provider_id = $provider_id;
        $this->reasons_id = $reasons_id;
    }
}