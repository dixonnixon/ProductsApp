<?php
namespace Core;

use App\Product;

interface Repo extends Retrieve, Upload
{
    
    public function update(Product $user);
    public function remove(Product $user);
}

?>