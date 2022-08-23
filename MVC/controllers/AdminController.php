<?php


namespace app\controllers;


use app\engine\App;
use app\engine\Auth;
use app\engine\Request;

class AdminController extends RenderController
{
    public function actionIndex() {
        echo $this->render('admin/index', [
            'categorys' => App::call()->categoryRepository->getAll(),
            'feedback' => App::call()->feedbackRepository->getAll(),
            'imagesGalleryPhotos' => array_slice(scandir(App::call()->config['GALLERY_PHOTO_DIR']), 2),
        ]);
    }

    public function actionLogin() {

        $login = (new Request())->getParams()['login'];
        $pass = (new Request())->getParams()['pass'];

        if (Auth::Auth($login, $pass)) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            header( "Location: /index/errors");
            die();
        }
    }

    public function actionLogout() {
        session_destroy();
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}