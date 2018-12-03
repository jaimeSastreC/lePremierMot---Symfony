<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categorie;
use AppBundle\Entity\Salle;
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
     * @Route("/admin/categories" , name="admin_categories")
     */
    public function listAdminCategoriesAction(){

        // je genère le Repository de Doctrine
        $categorieRepository = $this->getDoctrine()->getRepository(Categorie::class);

        //requete sur l'ensemble des catégories
        $categories = $categorieRepository->findAll();

        //retourne la page html spectacles en utiliasnt le twig categories
        return $this->render("@App/Pages/categories_admin.html.twig",
            [
                'categories' => $categories
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

        //retourne la page html spectacles en utiliasnt le twig spectateurs
        return $this->render("@App/Pages/spectateurs_admin.html.twig",
            [
                'spectateurs' => $spectateurs
            ]);
    }

    /**
     * @Route("/admin/salles" , name="admin_salles")
     */
    public function listAdminSalleAction(){

        // je genère le Repository de Doctrine
        $salleRepository = $this->getDoctrine()->getRepository(Salle::class);

        //requete sur l'ensemble des salle
        $salles = $salleRepository->findAll();

        //retourne la page html spectacles en utiliasnt le twig salles
        return $this->render("@App/Pages/salles_admin.html.twig",
            [
                'salles' => $salles
            ]);
    }

//**************************************** Unique ********************************************************
    /**
     * @Route("/admin/tarif/{id}" , name="admin_tarif", defaults={"id"= 1 })
     */
    public function AdminTarifAction($id=1){

        // je genère le Repository de Doctrine
        $repository = $this->getDoctrine()->getRepository(Tarif::class);

        //requete sur Entity Tarif avec $id
        $tarif = $repository->find($id);

        //retourne la page html tarif en utiliasnt le twig tarif
        return $this->render("@App/Pages/tarif_admin.html.twig",
            [
                'tarif' => $tarif
            ]);
    }

    /**
     * @Route("/admin/categorie/{id}" , name="admin_categorie", defaults={"id"= 1 })
     */
    public function AdminCategorieAction($id){

        // je genère le Repository de Doctrine
        $repository = $this->getDoctrine()->getRepository(Categorie::class);

        //requete sur Entity Tarif avec $id
        $categorie = $repository->find($id);

        //retourne la page html categorie en utiliasnt le twig categorie
        return $this->render("@App/Pages/categorie_admin.html.twig",
            [
                'categorie' => $categorie
            ]);
    }

    /**
     * @Route("/admin/spectateur/{id}" , name="admin_spectateur", defaults={"id"= 1 })
     */
    public function AdminSpectateurAction($id){

        // je genère le Repository de Doctrine
        $repository = $this->getDoctrine()->getRepository(Spectateur::class);

        //requete sur Entity Tarif avec $id
        $spectateur = $repository->find($id);

        //retourne la page html spectateur en utiliasnt le twig spectateur
        return $this->render("@App/Pages/spectateur_admin.html.twig",
            [
                'spectateur' => $spectateur
            ]);
    }

    /**
     * @Route("/admin/salle/{id}" , name="admin_salle", defaults={"id"= 1 })
     */
    public function AdminSalleAction($id){

        // je genère le Repository de Doctrine
        $repository = $this->getDoctrine()->getRepository(Salle::class);

        //requete sur Entity Tarif avec $id
        $salle = $repository->find($id);

        //retourne la page html salle en utiliasnt le twig salle
        return $this->render("@App/Pages/salle_admin.html.twig",
            [
                'salle' => $salle
            ]);
    }


}