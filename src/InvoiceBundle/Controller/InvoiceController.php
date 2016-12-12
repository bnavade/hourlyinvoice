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
use InvoiceBundle\Model\InvoiceDb;
use InvoiceBundle\Entity\Invoice;
use InvoiceBundle\Form\InvoiceType;

class InvoiceController extends FOSRestController {
    
    /**
     * Create a new Invoice
     * @var Request $request
     * @return View|array
     * @return Post
     * @View()
     * @Post("/invoice/create")
     */
    
    public function createAction(Request $request){
        $entity = new Invoice();
        $form = $this->createForm(new InvoiceType(), $entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            if($entity->getDate() === null) {
                $entity->setDate(new \DateTime('now'));
            }
            $em = $this->getDoctrine()->getManager();
            $InvoiceDb = new InvoiceDb($em);
            $InvoiceDb->save($entity);
            return new JsonResponse(array('message' => 'Data saved.'));

        } else {
        
        $view = $this->view(['form' => $form], 400);
        }
        return $this->handleView($view);
    }
}
