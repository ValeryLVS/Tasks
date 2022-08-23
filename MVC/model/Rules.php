<?php


namespace app\model;


class Rules
{
    public static function can_upload($file)
    {
        if ($_FILES['img']['name'] == '')
            return false;

        if ($_FILES['img']['size'] == 0)
            return false;

        $getMime = explode('.', $_FILES['img']['name']);
        $mime = strtolower(end($getMime));
        $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg', 'svg');

        if (!in_array($mime, $types))
            return false;

        return true;
    }

}