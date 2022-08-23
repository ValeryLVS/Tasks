<?php


namespace app\model\repositories;

use app\model\Repository;
use app\model\entities\Town;


class TownRepository extends Repository
{

    public function getEntityClass()
    {
        return Town::class;
    }

    public function getTableName()
    {
        return 'town';
    }
}