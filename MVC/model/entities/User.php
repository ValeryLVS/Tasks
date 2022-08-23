<?php


namespace app\model\entities;

use app\model\Model;

class User extends Model
{
    protected $id;
    protected $login;
    protected $pass;
    protected $role;

    protected $props = [
        'login' => false,
        'pass' => false,
        'role' => false
    ];

    public function __construct($login = null, $pass = null, $role = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->role = $role;
    }
}