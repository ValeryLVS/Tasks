<?php


namespace app\controllers;


use app\engine\App;

class IndexController extends RenderController
{
    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionUsers()
    {
    $user = App::call()->userRepository->getTableName();

        echo $this->render('users',
        [
            'users' =>  App::call()->userRepository->getAll()
        ]);
    }

    public function actionErrors()
    {
        echo $this->render('errors/errors');
    }
}