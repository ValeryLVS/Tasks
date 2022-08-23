<?php


namespace app\model\repositories;


use app\model\entities\User;
use app\model\Repository;

class UserRepository extends Repository
{
    public function getEntityClass()
    {
        return User::class;
    }
    public function getTableName()
    {
        return 'user';
    }
}