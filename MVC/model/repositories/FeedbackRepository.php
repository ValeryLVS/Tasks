<?php


namespace app\model\repositories;


use app\model\entities\Feedback;
use app\model\Repository;

class FeedbackRepository extends Repository
{
    public function getEntityClass()
    {
        return Feedback::class;
    }
    public function getTableName()
    {
        return 'feedback';
    }
}


