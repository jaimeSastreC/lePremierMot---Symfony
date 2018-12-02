<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Tarif;
use AppBundle\Repository\TarifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminModifierControler extends Controller
{
    /**
     * @Route("/admintest", name="admintest")
     */
    public function indexAdminTestAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render("@App/Pages/indexAdmin.html.twig");
    }

    /**
     *@Route("/admin/tarif_modifier/{id}", name="admin_modif_tarif")
     */
    public function tarifModifAction($id)
    {
        //var_dump($id);die;
        // je genère le Repository de Doctrine
        /** @var $repository TarifRepository */
        $repository = $this->getDoctrine()->getRepository(Tarif::class);

        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        //avec le repository je récupère dans la BD l'auteur sous forme d'Identity (instance)
        $tarif = $repository->find($id);

        //TODO test, puis avec form
        $tarif->setPrixPlace('1234');
        // j'enregistre en base de donnée
        $entityManager->flush();

        // Important : redirige vers la route demandée, avec name = 'admin_tarifs'
        return $this->redirectToRoute('admin_tarifs');

    }
}