<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 30/11/2018
 * Time: 15:48
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Categorie;
use AppBundle\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Repository\CategorieRepository;

class FormController extends Controller
{

    /**
     * @Route("/admin/form_catergorie", name="admin_form_catergorie")
     */
    public function AdminCategieAction(Request $request)
    {
       // création Entité 'Categorie
        $form= $this->createForm(CategorieType::class, new Categorie);

        //assie les données envoyées (éventuellement le client via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){
            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){
                // récupère données dans Objet/Entité Categorie
                $categorie = $form->getData();
                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($categorie);
                // enregistre en BD
                $entityManager->flush();

                return $this->redirectToRoute('admin');
            }

        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_categorie.html.twig",
                [
                    'formcategorie' => $form->createView()
                ]

            );
    }


}