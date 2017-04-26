<?php


namespace MyApp\Component\Product\Application\Usecase;

use MyApp\Component\Product\Domain\Repository\OwnerRepository;

class GetOwnerUseCase
{
    private $ownerRepository;

    public function __construct(OwnerRepository $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }



    public function execute($ownerId)
    {
        return $this->ownerRepository->getById($ownerId);
    }
}