<?php

namespace App\Controller;

use App\Entity\ComplementInfo;
use App\Form\ComplementInfoType;
use App\Form\ContactType;
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
     * @Route("/mon-espace")
     * @return Response
     */

    public function monEspace(): Response {

        return $this->render('mon_espace.html.twig', [
            'title' => 'Mon espace',
            'description' => 'Vous trouverez ici tous les documents utiles et à remplir pour s\'inscrire à la formation que vous avez choisi.',
            'keywords' => 'Mon compte, CPF, inscription, documents'
        ]);

    }

    /**
     * @Route("/contact")
     * @param Request $request
     * @return Response
     */
    public function contact(Request $request, \Swift_Mailer $mailer): Response {

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $message = (new \Swift_Message($contact['subject']))
                ->setFrom($contact['email'])
                ->setTo('crowbackend@gmail.com')
                ->setBody(
                    $contact['message'],
                    'text/plain'
                );
            $mailer->send($message);

            $this->addFlash('notice', 'Le méssage a bien étais envoyer vous allez recevoir une réponse d\'ici 48h' );

            return $this->redirectToRoute('app_front_index');
        }

        return $this->render('contact.html.twig', [
            'title' => 'Contacter Nous',
            'description' => 'Contacter nous a tout moment si vous avez des questions',
            'keywords' => 'Contact, monCpf, info',
            'formContact' => $form->createView()
        ]);
    }




















}