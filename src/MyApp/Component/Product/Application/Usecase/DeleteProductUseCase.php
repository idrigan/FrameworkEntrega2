<?php


namespace MyApp\Component\Product\Application\Usecase;


use MyApp\Component\Product\Domain\Repository\ProductRepository;

class DeleteProductUseCase
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;

    }

    public function execute($idProduct){

       $product = $this->productRepository->getProductById($idProduct);
       return $this->productRepository->removeProduct($product);


    }
}