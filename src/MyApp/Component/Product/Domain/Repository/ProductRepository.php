<?php

namespace MyApp\Component\Product\Domain\Repository;

use MyApp\Component\Product\Domain\Product;

interface ProductRepository
{
    public function save(Product $product);
    public function getAll();
    public function getProductById($idProduct);
    public function removeProduct(Product $product);
}