<?php


namespace app\engine;


class Request
{
    protected $params;
    protected $method;

    public function __construct()
    {
        $this->parseRequest();
    }

    protected function parseRequest()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->params = $_REQUEST;

        if (!is_null($this->params)) {
            foreach ($this->params as $key => $value) {
                $this->params[$key] = htmlentities($value);
            }
        }

        $data = json_decode(file_get_contents('php://input'));

        if (!is_null($data)) {
            foreach ($data as $key => $value) {
                $this->params[$key] = htmlentities($value);
            }
        }
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getMethod()
    {
        return $this->method;
    }

}