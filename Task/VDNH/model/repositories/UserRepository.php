<?php


namespace app\model\repositories;


use app\model\entities\User;

class UserRepository extends \app\model\Repository
{

    public function getEntityClass()
    {
        return User::class;
    }

    public function getTableName()
    {
        return 'users';
    }
}