<?php

namespace MyApp\Bundle\ProductBundle\Owner\Repository;


use Doctrine\ORM\EntityRepository;

use MyApp\Component\Product\Domain\Owner;
use MyApp\Component\Product\Domain\Repository\OwnerRepository;


class OwnerRepositoryImpl extends EntityRepository implements OwnerRepository
{


    public function findAllOrderedByName()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT o FROM \MyApp\Component\Product\Domain\Owner o ORDER BY o.name ASC'
        )->getResult();

    }

    public function save(Owner $owner)
    {
        return $this->getEntityManager()->persist($owner);
    }

    public function getAll()
    {
        return $this->getEntityManager()->getRepository('MyApp\Component\Product\Domain\Owner')->findAll();
    }

    public function getById($ownerId)
    {
        return $this->getEntityManager()->getRepository('MyApp\Component\Product\Domain\Owner')->findOneBy(array("id"=>$ownerId));
    }

}