<?php
namespace Core;


abstract Class Controller
{
    public function __construct()
    {
        $this->products = new ProductsModel();
    }

    public function execute($method, $params): void
    {   
        $this->results = call_user_func_array(
            array(
                $this->products, 
                $method
        ), $this->prepareParameters($params));    
    }
}