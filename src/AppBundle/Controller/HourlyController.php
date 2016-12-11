<?php
// src/AppBundle/Controller/HourlyController
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use InvoiceBundle\Model\

class HourlyController extends Controller {
    /**
     * @Route("/hourly/invoice")
     */
    public function actionInvoice() {
        return $this->render('hourly/invoice.html.twig');
    }
    
    /**
     * @Route("/hourly/download")
     */
    public function actionDownload(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $date =  $request->query->get('date');
        if(!empty($date)) {
        $sql = "SELECT  invoice FROM InvoiceBundle:Invoice invoice";
        $query = $em->createQuery($sql);
        $invoices = $query->getResult();
        $invoice = $invoices[0];  // will be used for single result
        $mpdfService = $this->get('tfox.mpdfport');
        $html = $this->renderView('hourly/pdf.html.php', array('invoice' => $invoice, 'invoices' => $invoices));       
        $response = $mpdfService->generatePdfResponse($html);
        return $response; 
        }
       
        $lists = $query->getResult();
        
        return $this->render('hourly/download.html.twig', array('lists' => $lists));
    }
}
