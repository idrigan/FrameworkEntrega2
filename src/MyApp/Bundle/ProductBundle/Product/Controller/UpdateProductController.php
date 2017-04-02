<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;

use MyApp\Component\Product\Application\Usecase\UpdateProductUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateProductController extends Controller
{

    public function execute(Request $request, $id)
    {

        $json = json_decode($request->getContent(), true);

        $em = $this->getDoctrine()->getEntityManager();

        $updateProductUseCase = new UpdateProductUseCase( $em->getRepository('MyApp\Component\Product\Domain\Product') );

        $name = $json['name'];
        $price = $json['price'];
        $description = $json['description'];
        
        $updateProductUseCase->execute((string)$name,(float)$price,(string)$description,(int)$id);

        $em->flush();

        return new Response('Producto Actualizado', 200);

    }

}