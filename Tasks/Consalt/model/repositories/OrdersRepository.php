<?php


namespace app\model\repositories;

use app\model\entities\Orders;

class OrdersRepository extends \app\model\Repository
{

    public function getEntityClass()
    {
        return Orders::class;
    }

    public function getTableName()
    {
        return 'orders';
    }
}