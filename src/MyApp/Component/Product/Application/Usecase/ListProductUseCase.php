<?php

namespace MyApp\Component\Product\Application\Usecase;


use MyApp\Component\Product\Domain\Repository\ProductRepository;

class ListProductUseCase
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;

    }



    public function execute(){

      return  $this->productRepository->getAll();
    }
}