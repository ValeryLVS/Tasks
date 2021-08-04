<?php


namespace app\model\repositories;

use app\model\Repository;
use app\model\entities\Providers;

class ProvidersRepository extends Repository
{

    public function getEntityClass()
    {
        return Providers::class;
    }

    public function getTableName()
    {
        return 'providers';
    }
}