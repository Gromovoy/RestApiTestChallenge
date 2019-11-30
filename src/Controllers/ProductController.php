<?php
namespace src\Controllers;
use src\Services\Product;

class ProductController{

    public function createProducts(){
        $serviceGenerator = new Product();
        $serviceGenerator->gererate();
    }

    public function getProducts(){
        $ProductsService = new Product();
        $collection = $ProductsService->get();
        return json_encode($collection);
    }
}