<?php
/**
 * Created by PhpStorm.
 * User: MiPro
 * Date: 30.11.2019
 * Time: 4:32
 */

namespace src\Entity\Order;
use src\Entity\Product\ProductCollectionInterface;


interface OrderInterface
{

    public function getStatus();
    public function setStatus($status);
    public function getProducts();
    public function getSum();

    public function setProducts(ProductCollectionInterface $products);

}