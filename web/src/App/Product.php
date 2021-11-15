<?php
namespace App;

class Product implements \JsonSerializable
{
    private $id;
    private $sku;
    private $price;

    function __construct($id, $sku, $price) 
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->price = $price;
    }

    static function createFrom(Array $state): Product 
    {
        return new Product(... $state);
    }

    static function stateObject(Object $state): Product
    {
        // var_dump("stateObject", $state, get_class_vars(__CLASS__));
        array_map(function($el) use ($state) {
            // var_dump(__CLASS__, $el);
            if(!property_exists(__CLASS__, $el))
                throw new \DomainException("No such property {$el}");
        },  array_keys(get_class_vars(__CLASS__)));
        // var_dump("fromState", $state, $state->id, $state->sku, $state->price,
        // new Product($state->id, $state->sku, $state->price));
        return new Product($state->id, $state->sku, $state->price);
    }

    function __get($prop) {
        // var_dump("GET", $prop, $this->$prop);
        if($this->$prop) {return $this->$prop;}
    }

    function jsonSerialize() {
        $vars = get_object_vars($this);
        return $vars;
    }
}



?>