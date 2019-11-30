<?php
/**
 * Created by PhpStorm.
 * User: MiPro
 * Date: 30.11.2019
 * Time: 4:35
 */

namespace src\Controllers;

use src\Services\Product as ProductService;
use src\Services\ServiceOrder;


class OrderController
{
    public function createOrder(array $productIds){

        $productService = new ProductService();
        $productCollection = $productService->get($productIds);
        $serviceOrder = new ServiceOrder();
        $serviceOrder->create($productCollection);
    }

}