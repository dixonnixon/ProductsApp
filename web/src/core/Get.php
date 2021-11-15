<?php
namespace Core;


class Get 
{
    private $methods = [];

    function __construct($req)
    {
        $reflection = new \ReflectionClass(Retrieve::class);

        $methods = $reflection->getMethods();

        // var_dump("<pre><b>");
        // var_dump("par", $req->get("par"));
        array_map([$this, 'setMethod'],
            $reflection->getMethods());
        
        // var_dump("</b></pre>");
    }

    function setMethod($el) {
        // var_dump("name", $el->name);
        array_push($this->methods, $el->name);
    }


    //logic of parsing parameters encapsulated here
    function specify(Array $params)
    {
       
        // var_dump("Retrieve methods", $this->methods, !$params[0],
        //     is_numeric($params[0]), $params);
        $result = null;
        if(!$params[0])
        {
            $result = [$this->methods[0], []];
        }

        if(is_numeric($params[0]))
        {
            $result =  [$this->methods[1], $params];
        }

        //let findAll Products by Default
        if(!$result)
        {
            throw new \Exception("no valid parameters passed {$params[0]}");
        }


        // var_dump("result", $result);
        return $result;
    }
}