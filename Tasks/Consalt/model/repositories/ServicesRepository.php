<?php


namespace app\model\repositories;

use app\model\Repository;
use app\model\entities\Services;

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