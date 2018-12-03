<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Categorie;
use AppBundle\Entity\Tarif;
use AppBundle\Repository\TarifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AdminSupprimerControler extends Controller
{
    /**
     * @Route("/admin/tarif_supprimmer/{id}", name="admin_supp_tarif")
     */
    public function tarifSuppAction($id){
        // je genère le Repository de Doctrine
        /** @var $repository TarifRepository */
        $repository = $this->getDoctrine()->getRepository(Tarif::class);

        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        //avec le repository je récupère dans la BD l'auteur sous forme d'Identity (instance)
        $tarif = $repository->find($id);

        // j'utilise la méthode remove du Manager pour effacer l'Entity
        $entityManager->remove($tarif);
        // j'enregistre en base de donnée
        $entityManager->flush();

        // Important : redirige vers la route demandée, avec name = 'admin_tarifs'
        return $this->redirectToRoute('admin_tarifs');
    }

    /**
     * @Route("/admin/categorie_supprimmer/{id}", name="admin_supp_categorie")
     */
    public function categorieSuppAction($id){
        // je genère le Repository de Doctrine
        /** @var $repository TarifRepository */
        $repository = $this->getDoctrine()->getRepository(Categorie::class);

        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        //avec le repository je récupère dans la BD l'auteur sous forme d'Identity (instance)
        $categorie = $repository->find($id);

        // j'utilise la méthode remove du Manager pour effacer l'Entity
        $entityManager->remove($categorie);
        // j'enregistre en base de donnée
        $entityManager->flush();

        // Important : redirige vers la route demandée, avec name = 'admin_categorie'
        return $this->redirectToRoute('admin_categories');
    }

    /**
     * @Route("/admin/spectateur_supprimmer/{id}", name="admin_supp_spectateur")
     */
    public function spectateurSuppAction($id){
        // je genère le Repository de Doctrine
        /** @var $repository TarifRepository */
        $repository = $this->getDoctrine()->getRepository(Spectateur::class);

        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        //avec le repository je récupère dans la BD l'auteur sous forme d'Identity (instance)
        $spectateur = $repository->find($id);

        // j'utilise la méthode remove du Manager pour effacer l'Entity
        $entityManager->remove($spectateur);
        // j'enregistre en base de donnée
        $entityManager->flush();

        // Important : redirige vers la route demandée, avec name = 'admin_spectateur'
        return $this->redirectToRoute('admin_spectateurs');
    }
}