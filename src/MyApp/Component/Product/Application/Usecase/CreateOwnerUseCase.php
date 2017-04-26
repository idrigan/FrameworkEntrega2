<?php

namespace MyApp\Component\Product\Application\Usecase;


use MyApp\Component\Product\Domain\Repository\OwnerRepository;
use MyApp\Component\Product\Domain\Owner;

class CreateOwnerUseCase
{
    private $ownerRepository;

    public function __construct(OwnerRepository $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;

    }



    public function execute($ownerName){



        $owner = new Owner($ownerName);

        $this->ownerRepository->save($owner);
    }
}