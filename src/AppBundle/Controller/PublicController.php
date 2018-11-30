<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class PublicController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render("@App/Pages/index.html.twig");
    }

    /**
     * @Route("/gallerie", name="gallerie")
     */
    public function gallerieAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render("@App/Pages/gallerie.html.twig");
    }
}