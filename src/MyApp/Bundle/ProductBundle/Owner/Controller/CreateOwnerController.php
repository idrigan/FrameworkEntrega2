<?php

namespace MyApp\Bundle\ProductBundle\Owner\Controller;


use MyApp\Component\Product\Application\Usecase\CreateOwnerUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateOwnerController extends Controller
{

    public function execute(Request $request)
    {

        $json = json_decode($request->getContent(), true);

        $em = $this->getDoctrine()->getEntityManager();

        $createOwnerCase = new CreateOwnerUseCase( $em->getRepository('MyApp\Bundle\ProductBundle\Entity\Owner') );

        $createOwnerCase->execute($json['name']);



        $em->flush();


        return new Response('Crear Usuario', 201);

    }

}