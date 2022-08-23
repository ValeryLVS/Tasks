<?php


namespace app\controllers;


use app\engine\App;
use app\engine\Auth;
use app\model\entities\Category;
use app\model\repositories\CategoryRepository;
use app\model\repositories\ServicesRepository;


class CategoryController extends RenderController
{
    public function actionAdd()
    {
        if (!Auth::isAdmin()) {
            header( "Location: /index/errors");
            die();
        }

        $category = new Category(
            $_POST['slug'] = CategoryRepository::friendlyURL($_POST['name']),
            $_POST['name'],
            $_POST['price'],
            $_POST['info'],
            $_FILES['img']['name'],
            $_POST['other']);

        App::call()->categoryRepository->save($category);

        CategoryRepository::downloadIMG($category);

        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    public function actionUpdate($slug)
    {
        if (!Auth::isAdmin()) {
            header( "Location: /index/errors");
            die();
        }

        $category = App::call()->categoryRepository->getOneWhere('slug', $slug);
        $services = App::call()->servicesRepository->getAllWhere('category', $category->id);

        echo $this->render('admin/edit', [
            'id' => $category->id,
            'slug' => $category->slug,
            'name' => $category->name,
            'price' => $category->price,
            'img' => $category->img,
            'info' => $category->info,
            'other' => $category->other,
            'services' => $services,
            'imagesLogoAuto' => array_slice(scandir(App::call()->config['GALLERY_LOGOAUTO_DIR']), 2),
        ]);
    }

    public function actionStore()
    {
        if (!Auth::isAdmin()) {
            header( "Location: /index/errors");
            die();
        }

        $category = App::call()->categoryRepository->getOne($_POST['id']);

        if (is_null($_FILES['img']['tmp_name'])) {
            $category->slug = CategoryRepository::friendlyURL($_POST['name']);
            $category->name = $_POST['name'];
            $category->price = $_POST['price'];
            $category->info = $_POST['info'];
            $category->other = $_POST['other'];
        }
        else {
            if (file_exists(App::call()->config['GALLERY_SERVICE_DIR'] . $_POST['imgOld'])) {
                unlink(App::call()->config['GALLERY_SERVICE_DIR'] . $_POST['imgOld']);
            }

            $category->img = $_FILES['img']['name'];
            CategoryRepository::downloadIMG($category);
        }

        App::call()->categoryRepository->save($category);

        header("Location: /category/update/" . $category->slug);
    }

    public function actionDelete($slug)
    {
        if (!Auth::isAdmin()) {
            header( "Location: /index/errors");
            die();
        }

        $category = App::call()->categoryRepository->getOneWhere('slug', $slug);

        echo $this->render('admin/confirmDelete', [
            'name' => $category->name,
            'slug' => $category->slug,
        ]);
    }

    public function actionDeleteConfirmed($slug)
    {
        if (!Auth::isAdmin()) {
            header( "Location: /index/errors");
            die();
        }

        $category = App::call()->categoryRepository->getOneWhere('slug', $slug);

        if (file_exists(App::call()->config['GALLERY_SERVICE_DIR'] . $category->img)) {
            unlink(App::call()->config['GALLERY_SERVICE_DIR'] . $category->img);
        }

        App::call()->categoryRepository->delete($category);

        header("Location: /admin/");
    }
}