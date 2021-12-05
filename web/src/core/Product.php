<?php
namespace Core;

class Product extends Controller
{
    private $product;
    protected $results;

    protected function prepareParameters($params) {
        if(empty($params)) {
            return [];
        }
    }

    function results()
    {
        return $this->results;
    }
}
?>