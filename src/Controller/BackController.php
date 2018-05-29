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
     * @return Response
     */

    public function index(): Response {

        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('backOffice/index_admin.html.twig', [
            'title' => 'Espace Administrations',
            'description' => 'Bienvenue dans votre espace Administration',
            'users' => $users
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
            'description' => ''
        ]);

    }


}