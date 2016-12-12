<?php
// src/AppBundle/Controller/HourlyController
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use InvoiceBundle\Model\InvoiceDb;

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
        $InvoiceDb = new InvoiceDb($em);
        $date =  $request->query->get('date');
        if(!empty($date)) {
        $results = $InvoiceDb->getInvoiceByDate($date);
        $mpdfService = $this->get('tfox.mpdfport');
        $html = $this->renderView('hourly/pdf.html.php', array('results' => $results));       
        $response = $mpdfService->generatePdfResponse($html);
        return $response;
        }
       
        $lists = $InvoiceDb->getAllInvoice();
        return $this->render('hourly/download.html.twig', array('lists' => $lists));
    }
}
