<?php


namespace app\model\repositories;



use app\engine\App;
use app\model\Repository;
use app\model\Rules;

class GalleryRepository extends Repository
{
    public static function downloaderImg()
    {

        if (Rules::can_upload($_FILES) == true) {

            $tmp  = $_FILES['img']['tmp_name'];

            move_uploaded_file($tmp, App::call()->config['GALLERY_PHOTO_DIR'] . $_FILES['img']['name']);

            header_remove();

            return true;

        } else {
            return false;
        }
    }

    public function getEntityClass()
    {
        return null;
    }

    public function getTableName()
    {
        return 'gallery';
    }
}