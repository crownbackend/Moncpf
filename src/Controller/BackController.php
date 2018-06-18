<?php


namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class BackController extends Controller {


    /**
     * @Route("/admin")
     * @param Request $request
     * @return Response
     */

    public function index(Request $request): Response {

        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT user FROM App:user user ORDER BY user.id";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            9/*limit per page*/
        );



        return $this->render('backOffice/index_admin.html.twig', [
            'title' => 'Espace Administrations',
            'description' => 'Bienvenue dans votre espace Administration',
            'pagination' => $pagination
        ]);
    }

    /**
     * @Route("/admin/detail/{id}")
     * @param int $id
     * @return Response
     */

    public function detail(int $id): Response {


        $user = $this->getDoctrine()
                     ->getRepository(User::class)
                     ->find($id);
        ;


        return $this->render('backOffice/detail.html.twig', [
            'title' => '',
            'description' => '',
            'user' => $user
        ]);

    }


}