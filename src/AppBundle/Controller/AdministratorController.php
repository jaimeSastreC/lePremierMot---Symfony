<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tarif;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdministratorController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function indexAdminAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render("@App/Pages/indexAdmin.html.twig");
    }

    /**
     * @Route("/admin/tarifs" , name="admin_tarifs")
     */
    public function listAdminTarifsAction(){

        // cherche tous les tarifs avec instance de getDoctrine -> méthode get Repository
        // puis ->findAll  tous les tarifs

        $repository = $this->getDoctrine()->getRepository(Tarif::class);

        //appel de l'ensemble des auteurs
        $tarifs = $repository->findAll();

        //retourne la page html tarifs en utiliasnt le twig tarifs.html.twig
        return $this->render("@App/Pages/tarifs_admin.html.twig",
            [
                'tarifs' => $tarifs
            ]);
    }

    /**
     * @Route("/admin/tarif/{id}" , name="admin_tarif")
     */
    public function AdminTarifAction($id){

        // cherche tous les tarifs avec instance de getDoctrine -> méthode get Repository
        // puis ->findAll  tous les tarifs

        $repository = $this->getDoctrine()->getRepository(Tarif::class);

        //appel de l'ensemble des auteurs
        $tarif = $repository->find($id);

        //retourne la page html tarif en utiliasnt le twig auteur.html.twig
        return $this->render("@App/Pages/tarif_admin.html.twig",
            [
                'tarif' => $tarif
            ]);
    }


}