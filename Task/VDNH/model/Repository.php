<?php


namespace app\model;


use app\engine\App;
use app\interfaces\IModel;

abstract class Repository implements IModel
{
    public function getAll()
    {
        $TableName = $this->getTableName();
        $sql = "SELECT * FROM {$TableName}";
        return App::call()->db->queryObjects($sql, [], $this->getEntityClass());
    }

    abstract public function getTableName();
    abstract public function getEntityClass();
}