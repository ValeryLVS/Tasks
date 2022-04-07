<?php


namespace app\engine;


use app\model\repositories\ClientsRepository;
use app\model\repositories\OrdersRepository;
use app\model\repositories\ProvidersRepository;
use app\model\repositories\ReasonRepository;
use app\model\repositories\ServicesRepository;
use app\model\repositories\TownRepository;
use app\router\Router;
use app\traits\TSingletone;


/**
 * Class App
 * @property TownRepository $townRepository
 * @property ClientsRepository $clientsRepository
 * @property ProvidersRepository $providersRepository
 * @property ServicesRepository $servicesRepository
 * @property OrdersRepository $ordersRepository
 * @property ReasonRepository $reasonRepository
 * @property Db $db
 */

class App
{
    use TSingletone;

    public $config;

    /**@var Storage */
    private $components;

    private $actionName;
    private $controllerClass;

    /**@return static
     */

    public static function call()
    {
        return static::getInstance();
    }

    public function runController()
    {
        $router = new Router();
        $router->run();

        $actionName = $router->getAction();
        $controllerClass = $this->config['CONTROLLER_NAMESPACE'] . $router->getController();

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(new Render());
            if (method_exists($controller, $actionName))
                call_user_func_array([$controller, $actionName], $router->getParams());
            else
                header( "Location: /index/errors");
        } else {
            header( "Location: /index/errors");
        }
    }

    /**
     * @throws \ReflectionException
     */
    public function createComponent($name)
    {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $class = $params['class'];
            if (class_exists($class)) {
                unset($params['class']);
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
        }
        return null;
    }

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
    }

    function __get($name)
    {
        return $this->components->get($name);
    }
}