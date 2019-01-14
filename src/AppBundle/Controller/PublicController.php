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
    public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render("@App/Pages/index.html.twig");
    }

    /**
     * @Route("/gallerie", name="gallerie")
     */
    public function gallerieAction()
    {
        // replace this example code with whatever you need
        return $this->render("@App/Pages/pageGallerie.html.twig");
    }

    /**
     * @Route("/spectacles", name="spectacles")
     */
    public function spectaclesAction()
    {
        // replace this example code with whatever you need
        return $this->render("@App/Pages/pageSpectacles.html.twig");
    }

    /**
     * @Route("/spectacle/{id}", name="spectacle", defaults={"id"= 1 })
     */
    public function spectacleAction($id)
    {
        // replace this example code with whatever you need
        return $this->render("@App/Pages/pageSpectacle.html.twig");
    }

    /**
     * @Route("/page_reservation", name="page_reservation")
     */
    public function reservationAction()
    {

        //Récupération de client_name de la session
        $client_name = $this->get('session')->get('client_name');
        // replace this example code with whatever you need
        return $this->render("@App/Pages/pageReservation.html.twig",[
                'client_name' => $client_name
                ]
            );
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        // replace this example code with whatever you need
        return $this->render("@App/Pages/pageContact.html.twig");
    }

    /**
     * @Route("/mentions_legales", name="mentions_legales")
     */
    public function mentionsLegalesAction()
    {
        // replace this example code with whatever you need
        return $this->render("@App/Pages/page_mentions_legales.html.twig");
    }
}
