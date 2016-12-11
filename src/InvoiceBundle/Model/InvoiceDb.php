<?php
// src/InvoiceBundle/Model/InvoiceDb.php
/**
 * Created by Bonface Navade.
 * 12/10/2016
 */

namespace InvoiceBundle\Model;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class InvoiceD {
    /**
     * @var $repository EntityManager
     */
    private $repository;
    /**
     * @var $manager EntityManager
     */
    private $manager;
    
    public function __construct(){
        $em = new EntityManager();
        // if using repository methods
        $this->repository = $em->getDoctrine()->getRepository('InvoiceBundle:Invoice');
        // Example
        // $result = $this->repository->findAll();
        
        // if using manager
        $this->manager = $em->getDoctrine()->getManager();
        // Example
        // Used for sql like queries with dql
    }
    
    // Save data
    public function save($invoice){
        $this->em->persist($invoice);
        $this->em->flush();
    }
    
    // Get all invoice with distinct date
    public function getAllInvoice() {
        //$sql = "SELECT DISTINCT DATE_FORMAT(invoice.Invdate, '%Y-%m-%d') FROM InvoiceBundle:Invoice invoice";
        $sql = "SELECT DISTINCT invoice.date FROM InvoiceBundle:Invoice invoice";
        $query = $this->manager->createQuery($sql);
        return $query->getResult();
    }
    
}
