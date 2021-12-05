<?php
namespace Core;

use sys\UniversalConnect;
use App\Product;

class ProductsModel implements Repo
{
    private $ds;
    
    function __construct()
    {
        $this->ds = UniversalConnect::doConnect();
    }

    public function add(Product $product)
    {
        // var_dump("insertion", $product);
        $sth = $this->ds->prepare("INSERT INTO products
            (sku, price) VALUES (:sku, :price)");
        
        $sth->execute([':sku' => $product->sku, 
            ':price' => $product->price]);

        
        return $this->ds->lastInsertId();
    }
  
    public function findById($id): Product
    {
        $sth = $this->ds->prepare('SELECT *
            FROM products
            WHERE id = :id');

        $sth->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, 
            '\App\Product', ['id', 'sku', 'price']);
        $sth->execute([':id' => $id]);

        if($sth->rowCount() === 0) {
            return new Product("", "", "");
        }
        $product = $sth->fetch();
        // var_dump($product);
        $sth->closeCursor();
        return $product;
    }

    public function findAll(): Array
    {
        $sth = $this->ds->query("SELECT 
        id, sku, price FROM products");
  

        return $sth->fetchAll(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, 'App\Product',
            ["id", "sku", "price"]);
    }

    public function update(Product $user)
    {
        
    }
    public function remove(Product $user)
    {
        
    }

    function fromState($state): Product
    {
        // var_dump("fromState", $state);
        if(is_object($state))
        {
            return Product::stateObject($state);
        }

        if(is_array($state))
        {
            return Product::createFrom($state);

        }
    }

}


?>