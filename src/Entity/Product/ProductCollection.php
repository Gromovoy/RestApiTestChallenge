<?php
/**
 * Created by PhpStorm.
 * User: MiPro
 * Date: 30.11.2019
 * Time: 3:58
 */

namespace src\Entity\Product;
use src\Services\Collection;

class ProductCollection extends Collection implements ProductCollectionInterface
{
    public function generateRandom($count)
    {
        for ($i=0;$i<$count;$i++)
        {
            $product = new Product();
            $price = rand(1, 100000);
            $product->setPrice($price);
            $name = 'Товара' . rand(1, 100000);
            $product->setName($name);
            $id = rand(1, 100000);
            $product->setId($id);
            $this->push($product);
        }



    }
}