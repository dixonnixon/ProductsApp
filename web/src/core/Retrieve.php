<?php
namespace Core;

use App\Product;


interface Retrieve
{
    public function findAll(): Array;
    public function findById($id): Product;
}

?>