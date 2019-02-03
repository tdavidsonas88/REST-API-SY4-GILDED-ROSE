<?php

namespace App\Controller;

use Doctrine\Common\Persistence\ManagerRegistry;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
    @Rest\RouteResource("Items", pluralize=false)
*/
class ItemsController extends FOSRestController implements ClassResourceInterface {

    /** ManagerRegistry $doctrine */
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getAction(){
         /** EntityManager $em */
         $em = $this->doctrine->getEntityManager();

         $query = $em->createQuery(
             'SELECT i FROM App\Entity\Item i'
         );
 
         $items = $query->getArrayResult();
 
         if ($items === null || empty($items)) {
             $result ='No items found';
         }else {
              $result = $items ;
         }
 
         return new JsonResponse(
             $result
         );
    }

}