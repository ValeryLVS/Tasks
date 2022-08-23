<?php


namespace app\controllers;


use app\engine\App;

class IndexController extends RenderController
{
    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionErrors()
    {
        echo $this->render('errors/errors');
    }
}