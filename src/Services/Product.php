<?php
namespace src\Services;

use src\Entity\Product\ProductCollection;
use src\Entity\Product\ProductRepository;
use src\Entity\Product\ProductCollectionInterface;

class Product
{
    const countGeneratedProducts = 20;
    public static function gererate(){

        $productCollection = new ProductCollection();
        $productCollection->generateRandom(self::countGeneratedProducts);
        $repository = new ProductRepository();
        $repository->save($productCollection);

    }

    public static function get($ids = null):ProductCollectionInterface{

        $repository = new ProductRepository();
        $productCollection = $repository->get($ids);
        return $productCollection;

    }
}