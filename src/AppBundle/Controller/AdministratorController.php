<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Spectateur;
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
        // méthode retourant la page Index
        return $this->render("@App/Pages/indexAdmin.html.twig");
    }


//****************************************Listes********************************************************

    /**
     * @Route("/admin/tarifs" , name="admin_tarifs")
     */
    public function listAdminTarifsAction(){

        // je genère le Repository de Doctrine
        $tarifRepository = $this->getDoctrine()->getRepository(Tarif::class);

        //appel de l'ensemble des auteurs
        $tarifs = $tarifRepository->findAll();

        //retourne la page html tarifs en utiliasnt le twig tarifs.html.twig
        return $this->render("@App/Pages/tarifs_admin.html.twig",
            [
                'tarifs' => $tarifs
            ]);
    }

    /**
     * @Route("/admin/spectateurs" , name="admin_spectateurs")
     */
    public function listAdminSpectateursAction(){

        // je genère le Repository de Doctrine
        $spectateurRepository = $this->getDoctrine()->getRepository(Spectateur::class);

        //requete sur l'ensemble des spectateurs
        $spectateurs = $spectateurRepository->findAll();

        //retourne la page html tarifs en utiliasnt le twig tarifs.html.twig
        return $this->render("@App/Pages/spectateurs_admin.html.twig",
            [
                'spectateurs' => $spectateurs
            ]);
    }

//**************************************** Unique ********************************************************
    /**
     * @Route("/admin/tarif/{id}" , name="admin_tarif")
     */
    public function AdminTarifAction($id){

        // je genère le Repository de Doctrine
        $repository = $this->getDoctrine()->getRepository(Tarif::class);

        //requete sur Entity Tarif avec $id
        $tarif = $repository->find($id);

        //retourne la page html tarif en utiliasnt le twig auteur.html.twig
        return $this->render("@App/Pages/tarif_admin.html.twig",
            [
                'tarif' => $tarif
            ]);
    }


}