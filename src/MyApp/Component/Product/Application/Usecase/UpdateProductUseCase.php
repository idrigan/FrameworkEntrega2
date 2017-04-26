<?php

namespace MyApp\Component\Product\Application\Usecase;


use MyApp\Component\Product\Domain\Repository\ProductRepository;

class UpdateProductUseCase
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;

    }

    public function execute($name,$price, $description,$idProduct){

        $product = $this->productRepository->getProductById($idProduct);

        $product->setName($name);
        $product->setPrice($price);
        $product->setDescription($description);
    }
}