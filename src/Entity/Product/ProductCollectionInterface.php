<?php
/**
 * Created by PhpStorm.
 * User: MiPro
 * Date: 30.11.2019
 * Time: 3:58
 */

namespace src\Entity\Product;


interface ProductCollectionInterface
{
 public  function generateRandom($count);
}