<?php


namespace MyApp\Component\Product\Application\Usecase;


use MyApp\Component\Product\Domain\Owner;
use MyApp\Component\Product\Domain\Product;
use MyApp\Component\Product\Domain\Repository\ProductRepository;

class CreateProductUseCase
{

    private $productRepository;

    public function __construct( ProductRepository $productRepository )
    {
        $this->productRepository = $productRepository;
    }

    public function execute($name, $price, $description, Owner $owner){

        $product = new Product((string)$name, (float)$price, (string)$description, $owner);



        $this->productRepository->save($product);
    }
}