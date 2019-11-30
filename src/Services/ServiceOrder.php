<?php
/**
 * Created by PhpStorm.
 * User: MiPro
 * Date: 30.11.2019
 * Time: 4:46
 */

namespace src\Services;

use src\Entity\Order\{Order,OrderRepository};
use src\Entity\Product\ProductCollection;


class ServiceOrder
{
    public function create(ProductCollection $productCollection){

        $order = new Order($productCollection,Order::newStatus);
        $nameRepository = $order->getRepository();
        $orderRepository = new $nameRepository;

        /** @var OrderRepository $orderRepository */
        $orderRepository->save($order);
    }

    public function getById($id){

        $order = new Order();
        $nameRepository = $order->getRepository();
        $orderRepository = new $nameRepository;

        /** @var OrderRepository $orderRepository */
        $orderRepository->save($order);
    }

}