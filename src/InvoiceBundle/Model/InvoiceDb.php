<?php
// src/InvoiceBundle/Model/InvoiceDb.php
/**
 * Created by Bonface Navade.
 * 12/10/2016
 */

namespace InvoiceBundle\Model;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class InvoiceDb {
    /**
     * @var $repository EntityManager
     */
    private $repository;
    /**
     * @var $manager EntityManager
     */
    private $em;
    
    public function __construct(EntityManager $em){
        $this->em = $em;
        // if using repository methods
        // $em = $this->getDoctrine()->getRepository('InvoiceBundle:Invoice');
        //$this->repository = $em
        // Example
        // $result = $this->repository->findAll();
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
        $query = $this->em->createQuery($sql);
        return $query->getResult();
    }
    
    // Get invoice by date
    public function getInvoiceByDate($date) {
        $sql = "SELECT invoice FROM InvoiceBundle:Invoice invoice WHERE invoice.date = :date";
        $query = $this->em->createQuery($sql)->setParameter('date', $date);
        return $query->getArrayResult();
    }
            
    
}
