<?php
namespace App;
use Core\Request;
class L1 
{
    private $params = [];
    private $method;
    private $type;
    
    function __construct($cmd, $type)
    {
        $this->cmd = $cmd;
        $this->type = $type;
    }

    protected function par($params) 
    {
        [$this->method, $this->params] = $this->type->specify(explode("/", $params));
    
        // if(is_object)
    }

    function parse($par)
    {
        $this->par($par);
        $this->cmd->execute($this->method, $this->params);
        return $this->cmd->results();
    }
}

class App
{
    private $req;
    private $l1;
    function __construct() 
    {
        ob_start();
        $this->req = new Request();
        // var_dump($this->req, $this->req->get("cmd"));
        $this->l1 = new L1($this->chooseCommand(),
            $this->req->getType());
    }

    protected function chooseCommand() { //setDefaultCommand
        //I think this is not a productType)
        $cmd = "Core\\" . ucFirst($this->req->get("cmd"));
        // var_dump($cmd, (!$cmd) );
        if(!$cmd) 
        { return new Core\Products(); }
        return new $cmd();
    }

    function run()
    {
        $json = $this->l1->parse($this->req->get("par"));
        // var_dump($json);
        ob_flush();
        echo JSON_ENCODE($json);
    }
}

?>