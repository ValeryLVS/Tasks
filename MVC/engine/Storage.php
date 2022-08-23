<?php


namespace app\engine;


class Storage
{
    protected $items = [];

    public function set($key, $object)
    {
        $this->items[$key] = $object;
    }

    public function get($key)
    {
        if(!isset($this->items[$key])){
            $this->items[$key] = App::call()->createComponent($key);
        }
        return $this->items[$key];
    }
}