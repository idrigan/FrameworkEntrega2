<?php

namespace MyApp\Bundle\ProductBundle\Owner\Controller;


use MyApp\Component\Product\Application\Usecase\ListOwnerUseCase;
use MyApp\Component\Product\Domain\Owner;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListOwnersController extends Controller
{

    public function execute()
    {

        $em = $this->getDoctrine()->getEntityManager();

        $listOwnerUseCase = new ListOwnerUseCase( $em->getRepository('MyApp\Component\Product\Domain\Owner') );

        $owners = $listOwnerUseCase->execute();

        $ownersAsArray = array_map(function (Owner $o) {
            return $this->ownerToArray($o);
        }, $owners);

        return new JsonResponse($ownersAsArray, 201);
    }

    private function ownerToArray(Owner $owner)
    {
        return [
            'id' => $owner->getId(),
            'name' => $owner->getName()
        ];
    }

}