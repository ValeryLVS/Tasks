<?php


namespace app\model;


class Users extends DbModel
{
    protected $id = null;
    protected $name;
    protected $gender;
    protected $birth_date;

    /**
     * Users constructor.
     * @param null $name
     * @param null $gender
     * @param null $birth_date
     */
    public function __construct($name = null, $gender = null, $birth_date = null)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->birth_date = $birth_date;
    }

    /**
     * @return string
     */
    public static function getTableName()
    {
        return 'users';
    }
}