<?php
namespace Core;

class Products extends Controller//controller
{
    private $products;
    protected $results;

    

    //filter
    protected function prepareParameters($params)
    {
        if(is_object($params))
        {
            return [$this->products->fromState(
                $params
            )];
        }
     
        if(count($params) === 0)
                return [];

        return $params;
    }

    function results()
    {
        return $this->results;
    }
}

?>