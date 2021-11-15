<?php
namespace Core;

class Products //controller
{
    private $products;
    private $results;

    public function __construct()
    {
        $this->products = new ProductsModel();
    }

    

    // public function addProduct($params)
    // {
    //     $product = new Product($params['username'], $params['password']);
    //     $this->products->add($product);
    // }

    // public function getProduct($params): User
    // {
    //     return $this->products->findBySku($params['sku']);
    // }

    // public function changePassword($params) //choose what to update
    // {
    //     $product = $this->getProduct($params);
    //     $user->changePassword($params['oldPassword'], $params['newPassword']);
    //     $this->products->update($product);
    // }

    public function execute($method, $params): void
    {   
        //again I thing this is not a Product Type
        // $this->products
        // var_dump( "pM", $params ,$method );

        //one more layer here???

        //because in POST it passes a JSON BOdy
        //& in case OF GET it passes an Id
        //-> let GET & POST classes do prepare parameters method?

        $this->results = call_user_func_array(
            array(
                $this->products, 
                $method
            ),
            $this->prepareParameters($params));    
    }

    //filter
    protected function prepareParameters($params)
    {

        //in case post params is objects ? why?
        // var_dump("prepareParameters", $params, is_object($params));
        
        if(is_object($params))
        {
            // var_dump("prepareParameters",  [$this->products->fromState(
            //     $params
            // )]);
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
        // var_dump($this->results);
        return $this->results;
    }
}

?>