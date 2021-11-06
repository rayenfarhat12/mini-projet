<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/calcul")
 */
class DemoRouteController extends AbstractController
{
    /**
     * @Route("/demoroute", name="demo_route")
     */
    public function index(): Response
    {
        return $this->render('demo_route/index.html.twig', [
            'controller_name' => 'DemoRouteController',
        ]);
    }
    /**
     * @Route("/somme/{a}/{b}", name="calcul_somme")
     */
    public function somme(int $a=0, int $b=0)
    {
        $s = $a + $b;
        return new Response("La somme de $a et $b = $s");
    }
    /**
     * @Route("/soustraction/{a}/{b}", name="calcul_soustraction")
     */
    public function soustraction(int $a=0, int $b=0)
    {
        $s = $a - $b;
        return new Response("La soustraction de $a et $b = $s");
    }
    /**
     * @Route("/multiplication{a}/{b}", name="calcul_multiplication")
     */
    public function multiplication(int $a=0, int $b=0)
    {
        $s = $a * $b;
        return new Response("La multiplication de $a et $b = $s");
    }
    /**
     * @Route("/redirect", name="redirection")
     */
    public function maRedirection()
    {
        return $this->redirectToRoute('calcul_somme', ['b' => 30]);
    }

    /**
     * @Route("/ar", name="afficher_route")
     */
    public function afficherRoute()
    { $r = $this->generateUrl("calcul_soustraction", ["a" => 20]);
        return new Response("URL : ".$r);
    }
}
