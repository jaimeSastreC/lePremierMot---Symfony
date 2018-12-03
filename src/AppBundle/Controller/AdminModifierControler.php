<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Categorie;
use AppBundle\Entity\Tarif;
use AppBundle\Form\CategorieType;
use AppBundle\Form\TarifType;
use AppBundle\Repository\CategorieRepository;
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
    public function tarifModifAction(Request $request, $id)
    {
        //var_dump($id);die;
        // je genère le Repository de Doctrine
        /** @var $repository TarifRepository */
        $repository = $this->getDoctrine()->getRepository(Tarif::class);

        //avec le repository je récupère dans la BD l'auteur sous forme d'Identity (instance)
        $tarif = $repository->find($id);

        //recherche entité TarifType abstraite pour créé la forme de Tarif avec pour objet parametre $tarif TODO
        $form = $this->createForm(TarifType::class, $tarif);

        // associe les données envoyées (éventuellement) par le client via le formulaire
        //à notre variable $form. Donc la variable $form contient maintenant aussi de $_POST
        //handlerequest reremplit le formulaire, récupère données et les reinjecte dans formulaire
        $form->handleRequest($request);

        //isSubmitted vérifie si il y a bien un contenu form envoyé, puis on regarde si valide (à compléter plus tard
        if ($form->isSubmitted()){
            if ($form->isValid()) {

                // récupère données dans Objet/Entité Categorie
                $tarif = $form->getData();

                // je récupère l'entity manager de doctrine
                $entityManager = $this->getDoctrine()->getManager();

                // j'enregistre en base de donnée, persist met dans zone tampon provisoire de l'unité de travail
                $entityManager->persist($tarif);

                // j'enregistre en base de donnée, persist met dans zone tampon provisoire de l'unité de travail
                $entityManager->persist($tarif);
                //mise à jour BD, envoy à bd
                $entityManager->flush();

                // Renvoi de confirmation d'enregistrement Message flash
                $this->addFlash(
                    'notice',
                    'Votre Tarif a bien été ajouté!'
                );

                // Important : redirige vers la route demandée, avec name = 'admin_tarifs'
                return $this->redirectToRoute('admin_tarifs');
            } else {
                //TODO afficher le Flash
                $this->addFlash(
                    'notice',
                    'Votre Tarif n\'a pas été enregitré, erreur!'
                );
            }
        }

        return $this->render(
            "@App/Pages/form_admin_tarif.html.twig",
            [
                'formtarif' => $form->createView()
            ]
        );
    }

    /**
     *@Route("/admin/categorie_modifier/{id}", name="admin_modif_categorie")
     */
    public function categorieModifAction(Request $request, $id)
    {
        //var_dump($id);die;
        // je genère le Repository de Doctrine
        /** @var $repository CategorieRepository */
        $repository = $this->getDoctrine()->getRepository(Categorie::class);

        //avec le repository je récupère dans la BD l'auteur sous forme d'Identity (instance)
        $categorie = $repository->find($id);

        //recherche entité CategorieType abstraite pour créé la forme de Categorie avec pour objet parametre $categorie TODO
        $form = $this->createForm(CategorieType::class, $categorie);

        // associe les données envoyées (éventuellement) par le client via le formulaire
        //à notre variable $form. Donc la variable $form contient maintenant aussi de $_POST
        //handlerequest reremplit le formulaire, récupère données et les reinjecte dans formulaire
        $form->handleRequest($request);

        //isSubmitted vérifie si il y a bien un contenu form envoyé, puis on regarde si valide (à compléter plus tard
        if ($form->isSubmitted()){
            if ($form->isValid()) {

                // récupère données dans Objet/Entité Categorie
                $categorie = $form->getData();

                // je récupère l'entity manager de doctrine
                $entityManager = $this->getDoctrine()->getManager();

                // j'enregistre en base de donnée, persist met dans zone tampon provisoire de l'unité de travail
                $entityManager->persist($categorie);

                // j'enregistre en base de donnée, persist met dans zone tampon provisoire de l'unité de travail
                $entityManager->persist($categorie);
                //mise à jour BD, envoy à bd
                $entityManager->flush();

                // Renvoi de confirmation d'enregistrement Message flash
                $this->addFlash(
                    'notice',
                    'Votre Catégorie a bien été ajouté!'
                );

                // Important : redirige vers la route demandée, avec name = 'admin_categories'
                return $this->redirectToRoute('admin_categories');
            } else {
                //TODO afficher le Flash
                $this->addFlash(
                    'notice',
                    'Votre Categorie n\'a pas été enregistré, erreur!'
                );
            }
        }

        return $this->render(
            "@App/Pages/form_admin_categorie.html.twig",
            [
                'formcategorie' => $form->createView()
            ]
        );
    }
}