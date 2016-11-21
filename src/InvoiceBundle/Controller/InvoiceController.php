<?php
// src/InvoiceBundle/Controller

namespace InvoiceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use InvoiceBundle\Entity\Invoice;
use InvoiceBundle\Form\InvoiceType;
class InvoiceController extends FOSRestController {
    
    /**
     * Create a new Invoice
     * @var Request $request
     * @return View|array
     *
     * @View()
     * @Post("/invoice/create")
     */
    
    public function createAction(Request $request){
        $entity = new Invoice();
        $form = $this->createForm(new InvoiceType(), $entity);
        //$form->handleRequest($request);
        $form->bind($request);

        if ($form->isValid()) {
            //$em = $this->getDoctrine()->getManager();
            //$em->persist($entity);
            //$em->flush();
            
            return $this->redirectView('pdf', array('id' => $entity->getId()));

        } 
        
        return array('form' => $form);
    }
}
