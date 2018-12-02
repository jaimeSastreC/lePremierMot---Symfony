<?php


namespace AppBundle\Controller;


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
}