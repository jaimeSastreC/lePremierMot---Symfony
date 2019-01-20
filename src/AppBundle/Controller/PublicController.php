<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ImageGallerie;
use AppBundle\Repository\ImageGallerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class PublicController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function indexAction()
    {
        return $this->render("@App/Pages/index.html.twig");
    }

    /**
     * @Route("/gallerie", name="gallerie")
     */
    public function gallerieAction(){
        // je genère le Repository de Doctrine
        /** @var $$imageGallerieRepository ImageGallerieRepository*/
        $imageGallerieRepository = $this->getDoctrine()->getRepository(ImageGallerie::class);

        //requete sur l'ensemble des catégories
        $imageGalleries = $imageGallerieRepository->findGallerie();

        return $this->render("@App/Pages/pageGallerie.html.twig",
                [
                    'imageGalleries' => $imageGalleries,
                ]
            );
    }

    /**
     * @Route("/spectacles", name="spectacles")
     */
    public function spectaclesAction()
    {
        return $this->render("@App/Pages/pageSpectacles.html.twig");
    }

    /**
     * @Route("/spectacle/{id}", name="spectacle", defaults={"id"= 1 })
     */
    public function spectacleAction($id)
    {
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
        return $this->render("@App/Pages/pageContact.html.twig");
    }

    /**
     * @Route("/mentions_legales", name="mentions_legales")
     */
    public function mentionsLegalesAction()
    {
        return $this->render("@App/Pages/page_mentions_legales.html.twig");
    }

}
