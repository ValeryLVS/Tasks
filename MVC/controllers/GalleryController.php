<?php


namespace app\controllers;


use app\engine\App;
use app\engine\Auth;
use app\model\repositories\GalleryRepository;
use app\engine\Request;

class GalleryController extends RenderController
{
    public function actionAdd()
    {
        if (!Auth::isAdmin()) {
            header( "Location: /index/errors");
            die();
        }

        GalleryRepository::downloaderImg();

        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    public function actionDelete()
    {
        if (!Auth::isAdmin()) {
            header( "Location: /index/errors");
            die();
        }

        $name = (new Request())->getParams()['name'];

        unlink(App::call()->config['GALLERY_PHOTO_DIR'] . $name);

        $response = [
            'status' => 'Ok',
        ];

        header("Content-type: application/json");

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    }
}