<?php

namespace MyApp\Bundle\ProductBundle\Owner\Repository;


use Doctrine\ORM\EntityRepository;

use Doctrine\ORM\Query;
use MyApp\Component\Product\Domain\Product;
use MyApp\Component\Product\Domain\Repository\ProductRepository;



class ProductRepositoryImpl extends EntityRepository implements ProductRepository
{
    public function save(Product $product)
    {
        return $this->getEntityManager()->persist($product);
    }

    public function getAll()
    {
        return $this->getEntityManager()->getRepository('MyApp\Component\Product\Domain\Product')->findAll(Query::HYDRATE_ARRAY);
    }

    public function getProductById($idProduct){
        return $this->getEntityManager()->getRepository('MyApp\Component\Product\Domain\Product')->findOneBy(array("id"=>$idProduct));
    }

    public function removeProduct(Product $product){
        return $this->getEntityManager()->remove($product);
    }
}