<?php
namespace Core;

abstract class receiver
{
    protected $par;
    function __construct($req)
    {
        $this->par = $req->getParameters();
        $this->methods();
    }

    abstract function  methods(): void ;
    abstract function specify(Array $params);

    function getRequestParameters()
    {
        return $this->par;
    }
}

?>