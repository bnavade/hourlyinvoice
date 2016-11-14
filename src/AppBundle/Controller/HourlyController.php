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
     * @Route("/hourly/create")
     */
    public function actionCreate() {
      try {

        // Logic here

        return new JsonResponse([
            'success' => true,
            'data'    => ["url" => "http://localhost:8000/hourly/pdf"] // Your data here
        ]);

    } catch (\Exception $exception) {

        return new JsonResponse([
            'success' => false,
            'code'    => $exception->getCode(),
            'message' => $exception->getMessage(),
        ]);

    }
    }
    
    /**
     * @Route("/hourly/pdf")
     */
    public function actionPdf() {
        
    }
    
    
}
