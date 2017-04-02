<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use MyApp\Component\Product\Application\Usecase\CreateProductUseCase;
use MyApp\Component\Product\Application\Usecase\GetOwnerUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateProductController extends Controller
{

    public function execute(Request $request)
    {

        $json = json_decode($request->getContent(), true);

        $name = $json['name'];
        $price = $json['price'];
        $description = $json['description'];
        $ownerId = $json['ownerId'];


        $em = $this->getDoctrine()->getEntityManager();

        $getOwnerUseCase = new GetOwnerUseCase( $em->getRepository('MyApp\Component\Product\Domain\Owner') );

        $owner = $getOwnerUseCase->execute($ownerId);

        $createProductCase = new CreateProductUseCase( $em->getRepository('MyApp\Component\Product\Domain\Product')  );

        $createProductCase->execute((string)$name, (float)$price, (string)$description, $owner);

         $em->flush();


        return new Response('Crear Producto', 201);

    }

}