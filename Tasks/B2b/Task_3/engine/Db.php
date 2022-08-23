<?php

namespace app\engine;

use app\traits\TSingletone;

class Db
{
    use TSingletone;

    /**
     * @var string[]
     */
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'testb2b',
        'charset' => 'utf8'
    ];

    /**
     * @var null
     */
    private $connection = null;

    /**
     * @return \PDO|null
     */
    private function getConnection()
    {
        if (is_null($this->connection)) {
            $this->connection = new \PDO(
                $this->prepareDSNString(),
                $this->config['login'],
                $this->config['password']
            );

            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    /**
     *
     * Подготовка запроса (универсальный запрос)
     *
     * @param $sql
     * @param $params
     * @return false|\PDOStatement
     */
    private function query($sql, $params)
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    /**
     * @return string
     */
    private function prepareDSNString()
    {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

    /**
     * @param $sql
     * @param $params
     * @return false|\PDOStatement
     */
    public function execute($sql, $params)
    {
        return $this->query($sql, $params);
    }

    /**
     * @return mixed
     */
    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }

    /**
     * Создаем экземпляр класса и возвращаем его с заполнеными данными  в виде объекта ед.
     *
     * @param $sql
     * @param $params
     * @param $class
     * @return object
     */
    public function queryObject($sql, $params, $class)
    {
        $statement = $this->query($sql, $params);
        $statement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        return $statement->fetch();
    }


    /**
     *
     * Создаем экземпляр класса и возвращаем его с заполнеными данными  в виде объекта
     *
     * @param $sql
     * @param $params
     * @param $class
     * @return object
     */
    public function queryObjects($sql, $params, $class): array
    {
        $statement = $this->query($sql, $params);
        $statement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        return $statement->fetchAll();
    }
}