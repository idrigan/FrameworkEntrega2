<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use Doctrine\ORM\Query;
use MyApp\Component\Product\Application\Usecase\ListOwnerUseCase;
use MyApp\Component\Product\Application\Usecase\ListProductUseCase;
use MyApp\Component\Product\Domain\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListProductsController extends Controller
{

    public function execute()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $listProductUseCase = new ListProductUseCase( $em->getRepository('MyApp\Component\Product\Domain\Product') );

        $products = $listProductUseCase->execute();


        $productsAsArray = array_map(function (Product $p) {
            return $this->productToArray($p);
        }, $products);

        return new JsonResponse($productsAsArray);
    }

    private function productToArray(Product $product)
    {
        return [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'description' => $product->getDescription(),
            'ownerId' => $product->getOwner()->getId()
        ];
    }

}