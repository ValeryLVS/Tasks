<?php


namespace app\model;


class Article extends DbModel
{
    protected $id = null;
    protected $user_id;
    protected $title;
    protected $info;

    /**
     * Article constructor.
     * @param null $user_id
     * @param null $title
     * @param null $info
     */
    public function __construct($user_id = null, $title = null, $info = null)
    {
        $this->user_id = $user_id;
        $this->title = $title;
        $this->info = $info;
    }

    /**
     * @return string
     */
    public static function getTableName()
    {
        return 'article';
    }
}