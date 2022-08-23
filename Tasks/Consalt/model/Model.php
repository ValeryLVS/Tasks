<?php


namespace app\model;


abstract class Model
{
    public function __set($name, $value)
    {
        if (isset($this->$name)) {
            $this->props[$name] = true;
            $this->$name = $value;
        }
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        }
        return null;
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }
}