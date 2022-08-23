<?php
namespace app\model;

use app\engine\Db;

abstract class DbModel extends Model
{
    /**
     *
     * Получение одного элемента через статичный вызов Db::getInstance в виде массива
     *
     * @param $id
     * @return static
     */
    public static function getOne($id)
    {
        $TableName = static::getTableName();
        $sql = "SELECT * FROM {$TableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }


    /**
     *
     * Получение всех элементов
     *
     * @return array|object
     */
    public static function getAll()
    {
        $TableName = static::getTableName();
        $sql = "SELECT * FROM {$TableName}";
        return Db::getInstance()->queryObjects($sql, [], static::class);
    }


    /**
     * @param $name
     * @param $value
     * @return object
     */
    public static function getOneWhere($name, $value)
    {
        $TableName = static::getTableName();

        $sql = "SELECT * FROM {$TableName} WHERE {$name} = :value";

        return Db::getInstance()->queryObject($sql, ['value' => $value], static::class);
    }

    /**
     * @param $name
     * @param $value
     * @return array|object
     */
    public static function getAllWhere($name, $value)
    {
        $TableName = static::getTableName();

        $sql = "SELECT * FROM {$TableName} WHERE {$name} = :value";

        $params['value'] = $value;
        return Db::getInstance()->queryObjects($sql, $params, static::class);
    }

    public function save()
    {
        if (is_null($this->id))
            $this->insert();
        else
            $this->update();
    }

    /**
     * CRUD - insert
     */
    public function insert()
    {
        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if ($key == "id") continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }

        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

        $TableName = static::getTableName();
        $sql = "INSERT INTO {$TableName} ({$columns}) VALUES ({$values})";


        Db::getInstance()->execute($sql, $params);

        $this->id = Db::getInstance()->lastInsertId();
    }

    /**
     * CRUD - update
     */
    public function update()
    {
        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if ($value == null)
            {
                $value = 0;
            };
            $params[":{$key}"] = $value;
            $columns[] = "`$key`" . "='" . $value . "'";
        }
        $values = implode(", ", $columns);

        $TableName = static::getTableName();

        $sql = "UPDATE {$TableName} SET {$values} WHERE `id` = {$this->id}";

        Db::getInstance()->execute($sql, $params);

        $this->id = Db::getInstance()->lastInsertId();
    }


    /**
     *
     * Абстрактный метод позволяет объявить что в наследник должен
     *
     * @return mixed
     */
    abstract public static function getTableName();
}