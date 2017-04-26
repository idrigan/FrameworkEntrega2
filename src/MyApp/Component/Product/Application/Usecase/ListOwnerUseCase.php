<?php


namespace MyApp\Component\Product\Application\Usecase;

use MyApp\Bundle\ProductBundle\Owner\Repository\OwnerRepositoryImpl;


class ListOwnerUseCase
{
    private $productRepository;

    public function __construct(OwnerRepositoryImpl $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }



    public function execute()
    {
        return $this->ownerRepository->getAll();
    }
}