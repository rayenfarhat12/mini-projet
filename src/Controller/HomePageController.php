<?php

namespace App\Controller;

use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{

    /**
     * @Route("/", name="home_page")
     */
    public function redirection(): Response
    {
        $session = $this->get('session');
        $em= $this->getDoctrine()->getRepository('App:Categorie');
        if (!$session->has('categories')) {  // if session cetgories n'existe pas on l'initiallise
            $session->set('categories', $em->findAll()
            );


        }
        return $this->redirectToRoute('home');
    }
    /**
     * @Route("/home", name="home")
     */
    public function index(LivreRepository $livreRepository): Response
    {   $session = $this->get('session');
        $em= $this->getDoctrine()->getRepository('App:Categorie');
        if (!$session->has('categories')) {  // if session cetgories n'existe pas on l'initiallise
            $session->set('categories', $em->findAll()
            );



        }
        return $this->render('home_page/index.html.twig', [

            'livres' => $livreRepository->recherchedisponible()

        ]);
    }



}

