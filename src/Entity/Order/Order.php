<?php

namespace src\Entity\Order;

use src\Entity\Product\Product;
use src\Entity\Product\ProductCollectionInterface;
use src\Entity\EntityInterface;

final class Order implements OrderInterface,EntityInterface
{
    const newStatus = 'новый';
    const doneStatus = 'выполнен';
    protected $status;
    protected $products;


    public function __construct(ProductCollectionInterface $products, $status)
    {
        $this->setStatus($status);
        $this->setProducts($products);

    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param ProductCollectionInterface $products
     */
    public function setProducts(ProductCollectionInterface $products): void
    {
        $this->products = $products;
    }

    public function getRepository()
    {
        return OrderRepository::class;
    }

    public function getSum()
    {
        $productCollection = $this->getProducts();
        $sum = 0;
        foreach ($productCollection as $product){
            /** @var Product $product */
            $sum = $sum + $product->getPrice();
        }

        return $sum;
    }


}