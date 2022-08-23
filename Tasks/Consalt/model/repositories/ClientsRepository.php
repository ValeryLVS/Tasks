<?php


namespace app\model\repositories;


use app\model\entities\Clients;

class ClientsRepository extends \app\model\Repository
{

    public function getEntityClass()
    {
        return Clients::class;
    }

    public function getTableName()
    {
        return 'clients';
    }
}