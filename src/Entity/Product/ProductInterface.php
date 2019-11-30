<?php
/**
 * Created by PhpStorm.
 * User: MiPro
 * Date: 30.11.2019
 * Time: 3:47
 */

namespace src\Entity\Product;


interface ProductInterface
{

    public function getPrice();
    public function setPrice($price);

    public function getId();
    public function setId($id);

    public function getName();


    public function setName($name);
}