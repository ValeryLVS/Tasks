<?php


namespace app\controllers;


use app\engine\App;

class IndexController extends RenderController
{
    public function actionIndex()
    {

        echo $this->render('index', [
            'categorys' => App::call()->categoryRepository->getAll(),
            'feedbacks' => App::call()->feedbackRepository->getAllTrue(),
            'imagesPhoto' => array_slice(scandir(App::call()->config['GALLERY_SERVICE_DIR']), 2),
            'imagesGallery' => array_slice(scandir(App::call()->config['GALLERY_PHOTO_DIR']), 2),
            'imagesLogoAuto' => array_slice(scandir(App::call()->config['GALLERY_LOGOAUTO_DIR']), 2),
        ]);
    }

    public function actionOneCategory($slug)
    {
        $category = App::call()->categoryRepository->getOneWhere('slug', $slug);

        echo $this->render('templates/oneCategory', [
            'category_name' => $category->name,
            'category_info' => $category->info,
            'category_img' => $category->img,
            'category_other' => $category->other,
            'services' => App::call()->servicesRepository->getAllWhere('category', $category->id),
            'imagesLogoAuto' => array_slice(scandir(App::call()->config['GALLERY_LOGOAUTO_DIR']), 2),
        ]);
    }

    public function actionErrors()
    {
        echo $this->render('errors/errors', [
            'imagesLogoAuto' => array_slice(scandir(App::call()->config['GALLERY_LOGOAUTO_DIR']), 2),
        ]);
    }
}