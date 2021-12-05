<?php
namespace Core;

class Post extends Receiver
{
    private $methods = [];

    function methods(): void
    {

        $reflection = new \ReflectionClass(Upload::class);

        array_map([$this, 'setMethod'],
            $reflection->getMethods());
    }

    function setMethod($el) {
        array_push($this->methods, $el->name);
    }

    protected function detectRequestBody() {
        return JSON_DECODE(file_get_contents('php://input'));
    }

    //logic of parsing parameters encapsulated here
    function specify(Array $params)
    {
        //params is not necessary here but in future
        //it could be in usage
        // var_dump($this->methods, $params, $this->detectRequestBody());
        // [$this->methods[1], $params]

        //at this stage its only add method With Post req
        return [$this->methods[0], $this->detectRequestBody()];
    }
}

?>