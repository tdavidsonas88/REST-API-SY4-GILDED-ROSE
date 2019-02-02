<?php

namespace App\Controller;

use \App\Entity\Item;
use \FOS\RestBundle\View\View;
use \Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

/**
    @Rest\RouteResource("Item", pluralize=false)
*/
class ItemController extends FOSRestController implements ClassResourceInterface {

    public function postAction(Request $request){
        $item = new Item();
        $item->setName($request->get('name'));
        $item->setSell_in($request->get('sell_in'));
        $item->setQuality($request->get('quality'));
        
        /** EntityManager $em */
        $em = $this->get('doctrine')->getEntityManager();

        try{
            $em->persist($item);
            $em->flush();
        }catch(UniqueConstraintViolationException $e){
            return new JsonResponse(
                "item already exists"
            );
        }
    
        return new JsonResponse(
            "item created"
        );

    }

    public function getAction(Request $request){
        $name = $request->get('name');

        /** EntityManager $em */
        $em = $this->get('doctrine')->getEntityManager();

        $query = $em->createQuery(
            'SELECT i FROM App\Entity\Item i where i.name = :name'
        )->setParameter('name', $name);;

        $item = $query->getArrayResult();

        if ($item === null || empty($item)) {
            $result = 'item ' .$name. ' not found';
        }else {
             $result = $item ;
        }

        return new JsonResponse(
            $result
        );
    }
}