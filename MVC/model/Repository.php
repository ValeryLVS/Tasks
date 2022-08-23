<?php


namespace app\model;


use app\engine\App;
use app\interfaces\IModel;

abstract class Repository implements IModel
{
    public function getOne($id)
    {
        $TableName = $this->getTableName();
        $sql = "SELECT * FROM {$TableName} WHERE id = :id";
        return App::call()->db->queryObject($sql, ['id' => $id], $this->getEntityClass());

    }

    public function getAll()
    {
        $TableName = $this->getTableName();
        $sql = "SELECT * FROM {$TableName}";
        return App::call()->db->queryObjects($sql, [], $this->getEntityClass());
    }

    public function getAllTrue()
    {
        $TableName = $this->getTableName();
        $sql = "SELECT * FROM {$TableName} WHERE `is_true` = 1";
        return App::call()->db->queryObjects($sql, [], $this->getEntityClass());
    }

    public function getOneWhere($name, $value)
    {
        $TableName = $this->getTableName();
        $sql = "SELECT * FROM {$TableName} WHERE `{$name}` = :value";
        return App::call()->db->queryObject($sql, ['value' => $value], $this->getEntityClass());
    }

    public function getAllWhere($name, $value, $options = 'default', $id = null)
    {
        $TableName = $this->getTableName();
        $sql = '';
        switch ($options) {
            case 'default':
                $sql = "SELECT * FROM {$TableName} WHERE {$name} = :value";
                break;
        }
        $params['value'] = $value;

        return App::call()->db->queryObjects($sql, $params, $this->getEntityClass());
    }

    public function save(Model $entity)
    {
        if (is_null($entity->id))
            $this->insert($entity);
        else
            $this->update($entity);
    }

    public function insert(Model $entity)
    {
        $params = [];
        $columns = [];

        foreach ($entity->props as $key => $value) {

            $params[":{$key}"] = $entity->$key;
            $columns[] = "`$key`";

        }

        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

        $TableName = $this->getTableName();
        $sql = "INSERT INTO {$TableName} ({$columns}) VALUES ({$values})";

        App::call()->db->execute($sql, $params);

        $entity->id = App::call()->db->lastInsertId();
    }

    public function update($entity)
    {
        $params = [];
        $columns = [];

        foreach ($entity->props as $key => $value) {

            if (!$value) continue;
            $params[":{$key}"] = $entity->$key;
            $columns[] .= "`" . $key . "` = :" . $key;
            $entity->props[$key] = false;

        }

        $values = implode(", ", $columns);

        $TableName = $this->getTableName();
        $sql = "UPDATE {$TableName} SET {$values} WHERE `id` = {$entity->id}";

        App::call()->db->execute($sql, $params);

        $entity->id = App::call()->db->lastInsertId();
    }

    public function delete(Model $entity)
    {
        $TableName = $this->getTableName();
        $sql = "DELETE FROM {$TableName} WHERE id = {$entity->id}";
        return App::call()->db->execute($sql, ['id' => $entity->id])->rowCount();
    }

    abstract public function getTableName();
    abstract public function getEntityClass();

}