<?php
namespace Core;

use Core\Get as Get;

class Request {
    private $request = [];

    public function __construct() 
    {
        $this->request = $this->initFromHttp();
        // var_dump($this->request);
        $method = "Core\\" . ucFirst(strToLower($_SERVER["REQUEST_METHOD"]));
        $this->type = new $method($this);
    }

    private function initFromHttp() 
    {
        if (!empty($_POST)) return $_POST;
        if (!empty($_GET))  return $_GET;
        if (!empty($_PUT))  return $_PUT;
        return array();
    }

    private function factory()
    {
        // $
    }

    public function get($name) 
    {
        if (!array_key_exists($name, $this->request)) return '';
        return $this->request[$name];
    }

    function getType()
    {
        return $this->type;
    }

    public function set($name,$value) 
    {
        $this->request[$name] = $value;
    }
}



?>