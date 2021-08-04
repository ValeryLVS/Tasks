<?php
namespace app\router;


class Router
{
    private $controller;
    private $action;
    private $routes;
    private $params;

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function __construct()
    {
        $this->routes = include ROOT_DIR . "/config/routes.php";
    }

    private function getURI()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public function run()
    {
        $uri = $this->getURI();
        
        foreach ($this->routes as $uriPattern => $route) {
            if (preg_match("~$uriPattern~", $uri)) {
                $intRoute = preg_replace("~$uriPattern~", $route, $uri);
                $segments = explode('/', $intRoute);
                $this->controller = ucfirst(array_shift($segments)) . "Controller";
                $this->action = 'action' . ucfirst(array_shift($segments));
                $this->params = $segments;
                break;
            }
        }
    }

}