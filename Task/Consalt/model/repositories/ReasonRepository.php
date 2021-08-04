<?php


namespace app\model\repositories;


use app\model\entities\Reason;

class ReasonRepository extends \app\model\Repository
{

    public function getEntityClass()
    {
        return Reason::class;
    }

    public function getTableName()
    {
        return 'reason';
    }
}