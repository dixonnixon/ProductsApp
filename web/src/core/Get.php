<?php
namespace Core;


class Get extends Receiver
{
    private $methods = [];

    function methods(): void
    {
        $reflection = new \ReflectionClass(Retrieve::class);

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
        $result = null;

        if(!$params[0])
        {
            $result = [$this->methods[0], []];
        }

        if(is_numeric($params[0]))
        {
            $result =  [$this->methods[1], $params];
        }

        
        if(!$result)
        {
            throw new \Exception("no valid parameters passed {$params[0]}");
        }

        return $result;
    }
}