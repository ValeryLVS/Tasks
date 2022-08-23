<?php


namespace app\model\repositories;


use app\model\entities\Services;
use app\model\Repository;

class ServicesRepository extends Repository
{
    public function getEntityClass()
    {
        return Services::class;
    }

    public function getTableName()
    {
        return 'services';
    }
}