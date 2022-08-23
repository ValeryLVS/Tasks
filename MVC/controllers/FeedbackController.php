<?php


namespace app\controllers;


use app\engine\App;
use app\engine\Auth;
use app\engine\Request;
use app\model\entities\Feedback;
use app\model\repositories\FeedbackRepository;

class FeedbackController extends RenderController
{
    public function actionSend()
    {
        $id = (new Request())->getParams()['id'];
        $name = (new Request())->getParams()['name'];
        $text = (new Request())->getParams()['text'];

        if (!empty($id)) {
            header( "Location: /index/errors");
        } else {
            $feedback = new Feedback($name, $text);

            App::call()->feedbackRepository->save($feedback);

            $response = [
                'status' => 'Ok',
            ];

            header("Content-type: application/json");

            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function actionConfirm() {

        if (!Auth::isAdmin()) {
            header( "Location: /index/errors");
            die();
        }
        $id = (int)(new Request())->getParams()['id'];

        $feedback = App::call()->feedbackRepository->getOne($id);

        $feedback->is_true = 1;

        App::call()->feedbackRepository->save($feedback);

        $response = [
            'status' => 'Ok',
        ];

        header("Content-type: application/json");

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function actionBun() {

        if (!Auth::isAdmin()) {
            header( "Location: /index/errors");
            die();
        }
        $id = (int)(new Request())->getParams()['id'];

        $feedback = App::call()->feedbackRepository->getOne($id);

        $feedback->is_true = 0;

        App::call()->feedbackRepository->save($feedback);

        $response = [
            'status' => 'Ok',
        ];

        header("Content-type: application/json");

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function actionDelete() {

        if (!Auth::isAdmin()) {
            header( "Location: /index/errors");
            die();
        }

        $id = (int)(new Request())->getParams()['id'];

        $feedback = App::call()->feedbackRepository->getOne($id);

        App::call()->feedbackRepository->delete($feedback);

        $response = [
            'status' => 'Ok',
        ];

        header("Content-type: application/json");

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}