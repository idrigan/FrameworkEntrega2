<?php

namespace MyApp\Component\Product\Domain\Repository;


use MyApp\Component\Product\Domain\Owner;

interface OwnerRepository
{

    public function findAllOrderedByName();
    public function save(Owner $owner);
    public function getAll();
    public function getById($ownerId);
}