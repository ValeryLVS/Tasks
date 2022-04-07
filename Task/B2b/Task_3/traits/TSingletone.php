<?php

namespace app\traits;


use app\engine\Db;

trait TSingletone
{
    private  static $instance = null;

    /**
     * @return static
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new Db();
        }
        return static::$instance;
    }

    private function __construct(){}
    private function __clone(){}
}