<?php

namespace MyApp\Bundle\ProductBundle\Product\Controller;;

use MyApp\Component\Product\Application\Usecase\DeleteProductUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DeleteProductController extends Controller
{

    public function execute($id)
    {

        $em = $this->getDoctrine()->getEntityManager();
        $deleteProductUseCase = new DeleteProductUseCase( $em->getRepository('MyApp\Component\Product\Domain\Product') );

        $deleteProductUseCase->execute($id);

       $em->flush();

       return new Response('Producto eliminado', 200);
    }

}