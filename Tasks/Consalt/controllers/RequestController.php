<?php


namespace app\controllers;


use app\engine\App;
use app\engine\Request;
use app\model\entities\Clients;
use app\model\entities\Orders;
use app\model\entities\Reason;

class RequestController extends RenderController
{
    public function actionIndex(){

        echo $this->render('stepOne', [
            'towns' =>  App::call()->townRepository->getAll(),
        ]);
    }

    public function actionStepOne()
    {
        $town = (new Request())->getParams()['town'];
        $name = (new Request())->getParams()['name'];
        $address = (new Request())->getParams()['address'];
        $phone = (new Request())->getParams()['phone'];
        $service = (new Request())->getParams()['service'];
        $additionally = (new Request())->getParams()['additionally'];

        $client = new Clients($town, $name, $address, $phone, $service, $additionally);

        $townName = App::call()->townRepository->getOne($town);

        App::call()->clientsRepository->save($client);
        $client = App::call()->clientsRepository->getOne($client->id);

        $providers = App::call()->providersRepository->getAllWhere('address', $townName->town, 'like');

        $allProviders= [];

        foreach ($providers as $provider) {
            $services = App::call()->servicesRepository->getAllWhere('provider', $provider->id);
            $provider->other = $services;
            array_push($allProviders, $provider);
        }


        echo $this->render('stepTwo', [
            'client' =>  $client,
            'providers' =>  $allProviders,
        ]);
    }

    public function actionStepTwo()
    {
        $client_id = (new Request())->getParams()['client_id'];
        $provider_id = (new Request())->getParams()['provider_id'];
        $service_id = (new Request())->getParams()['service_id'];

        $client = App::call()->clientsRepository->getOne($client_id);
        $provider = App::call()->providersRepository->getOne($provider_id);
        $service = App::call()->servicesRepository->getOne($service_id);


        echo $this->render('stepTree', [
            'client' =>  $client,
            'provider' =>  $provider,
            'service' =>  $service,
        ]);
    }

    public function actionStepTree()
    {
        $client_id = (new Request())->getParams()['client_id'];
        $provider_id = (new Request())->getParams()['provider_id'];
        $service_id = (new Request())->getParams()['service_id'];

        $order = new Orders($client_id, $provider_id, $service_id);

        App::call()->ordersRepository->save($order);

        echo $this->render('index', [
            'success' => "ok"
        ]);
    }

    public function actionEndCall()
    {
        echo $this->render('endCall');
    }

    public function actionConfirmEndCall()
    {
        $reason = (new Request())->getParams()['reason'];
        $commit = (new Request())->getParams()['commit'];

        $reasonSave = new Reason($reason, $commit);

        App::call()->reasonRepository->save($reasonSave);

        echo $this->render('index', [
            'success' => "endCall"
        ]);
    }
}