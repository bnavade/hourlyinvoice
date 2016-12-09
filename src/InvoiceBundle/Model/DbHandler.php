<?php
/**
 * Created by Bonface Navade.
 * 12/07/2016
 */

namespace InvoiceBundle\Model;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DbHandler
{
    private $repository;
    /**
     * @var $em EntityManager
     */
    private $em;
    
    public function __construct(EntityManager $em, $entityClass){
        $this->repository = $em->getRepository($entityClass);
        $this->em = $em;
    }
    // Save data
    public function save($invoice){
        $this->em->persist($invoice);
        $this->em->flush();
    }

}
