<?php


namespace app\controllers;


use app\engine\App;
use app\engine\Auth;
use app\model\entities\Services;
use app\model\repositories\ServicesRepository;


class ServicesController extends RenderController
{
    public function actionAdd()
    {
        if (!Auth::isAdmin()) {
            header( "Location: /index/errors");
            die();
        }

        $service = new Services(
            $_POST['category'],
            $_POST['name'],
            $_POST['price']
        );

        App::call()->servicesRepository->save($service);

        header("Location: " . $_SERVER['HTTP_REFERER']);

    }

    public function actionStore()
    {
        if (!Auth::isAdmin()) {
            header( "Location: /index/errors");
            die();
        }

        $service = App::call()->servicesRepository->getOne((int)$_POST['id']);

        $service->name = $_POST['name'];
        $service->price = $_POST['price'];

        App::call()->servicesRepository->save($service);

        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    public function actionDelete($id)
    {
        if (!Auth::isAdmin()) {
            header( "Location: /index/errors");
            die();
        }

        $service = App::call()->servicesRepository->getOne($id);

        App::call()->servicesRepository->delete($service);

        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}