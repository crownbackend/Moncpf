<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class RedirecteController extends Controller {


    /**
     * @Route("/index")
     * @return Response
     */
    public function index2(): Response {

        return $this->redirectToRoute('app_front_index');
    }


    /**
     * @Route("/accueil")
     * @return Response
     */
    public function index3(): Response {

        return $this->redirectToRoute('app_front_index');
    }




}