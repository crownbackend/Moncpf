<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends Controller {

    /**
     * @Route("/")
     * @return Response
     */

    public function index(): Response {

        return $this->render('index.html.twig', [
            'title' => 'Bienvenue sur mon cpf.info, le site de la formation professionnelle ',
            'description' => 'Venez faire des formations chez nous grace a votre compte CPF c\'est gratuit',
            'keywords' => 'formation professionnelle, formation pro, formation salariés, formation adultes, formation dif, formation cif, formation vae, formation CPF'
        ]);

    }


    /**
     * @Route("/etapes-a-suivre")
     * @return Response
     */
    public function etapeASuivre(): Response {

        return $this->render('etape_a_suivre.html.twig', [
            'title' => 'Étape a suivre',
            'description' => 'Retrouvez ci-dessous les différentes étapes à suivre pour s\'inscrire à la formation souhaitée.',
            'keywords' => 'Mon compte, CPF, inscription, formation'
        ]);
    }

    /**
     * @Route("/les-formations")
     * @return Response
     */

    public function formations(): Response {

        return $this->render('formations.html.twig', [
            'title' => 'Tout nos formations',
            'description' => 'Retrouvez ici tout nos formations Achat, Bureautique, Commerce et bien plus encore',
            'keywords' => 'Mon compte, CPF, inscription, formation, anglais, VTC, Assistanat, Secrétariat, Support'
        ]);

    }

    /**
     * @Route("/mes-documents")
     * @return Response
     */

    public function document(): Response {

        return $this->render('documents.html.twig', [
            'title' => 'Mes documents',
            'description' => 'Vous trouverez ici tous les documents utiles et à remplir pour s\'inscrire à la formation que vous avez choisi.',
            'keywords' => 'Mon compte, CPF, inscription, documents'
        ]);

    }


































}