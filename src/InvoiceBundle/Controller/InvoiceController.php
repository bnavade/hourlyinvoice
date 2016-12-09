<?php
// src/InvoiceBundle/Controller
/**
 * Created by Bonface Navade.
 * 12/07/2016
 */

namespace InvoiceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($entity);
            // actually executes the queries (i.e. the INSERT query)
            $em->flush();
            return new JsonResponse(array('message' => 'Data saved.'));
            //return new Response( ['message' => 'Saved new product with id '. $entity->getId()]);

        } else {
        
        $view = $this->view(['form' => $form], 400);
        }
        return $this->handleView($view);
    }
}
