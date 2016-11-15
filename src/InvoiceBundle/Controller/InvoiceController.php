<?php
// src/InvoiceBundle/Controller

namespace InvoiceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Invoice;
use AppBundle\Form\InvoiceType;
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
        $invoice = new Invoice();
        $form = $this->createForm(new InvoiceType(), $invoice);
        $form->handleRequest($request);

        if ($form->isValid()) {
            return array("success" => true);

        }

        return array(
            'form' => $form,
        );
    }
}
