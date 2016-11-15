<?php
// src/AppBundle/Controller/HourlyController
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HourlyController extends Controller {
    /**
     * @Route("/hourly/invoice")
     */
    public function actionInvoice() {
        return $this->render('hourly/invoice.html.twig');
    }
    
    /**
     * @Route("/hourly/pdf")
     */
    public function actionDownload() {
        
    }
    
    
}
