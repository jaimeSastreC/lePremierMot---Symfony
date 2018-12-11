<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 30/11/2018
 * Time: 15:48
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Categorie;
use AppBundle\Entity\Client;
use AppBundle\Entity\Reservation;
use AppBundle\Entity\Salle;
use AppBundle\Entity\Spectacle;
use AppBundle\Entity\Spectateur;
use AppBundle\Entity\Tarif;
use AppBundle\Form\CategorieType;
use AppBundle\Form\ClientType;
use AppBundle\Form\ReservationClientType;
use AppBundle\Form\ReservationType;
use AppBundle\Form\SalleType;
use AppBundle\Form\SpectacleType;
use AppBundle\Form\SpectateurType;
use AppBundle\Form\TarifType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Repository\CategorieRepository;

class FormController extends Controller
{

    /**
     * @Route("/admin/form_tarif", name="admin_form_tarif")
     */
    public function AdminTarifFormAction(Request $request)
    {
        // création Entité "Tarif"
        $form= $this->createForm(TarifType::class, new Tarif);

        //saisie des données envoyées (éventuellement) le client via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){
            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){
                // récupère données dans Objet/Entité Categorie
                $tarif = $form->getData();
                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($tarif);
                // enregistre en BD
                $entityManager->flush();

                return $this->redirectToRoute('admin_tarifs');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_admin_tarif.html.twig",
            [
                'formtarif' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/admin/form_categorie", name="admin_form_categorie")
     */
    public function AdminCategieFormAction(Request $request)
    {
       // création Entité  "Categorie"
        $form= $this->createForm(CategorieType::class, new Categorie);

        //saisie des données envoyées (éventuellement) le client via le Formulaire
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

                return $this->redirectToRoute('admin_categories');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_admin_categorie.html.twig",
                [
                    'formcategorie' => $form->createView()
                ]
            );
    }

    /**
     * @Route("/admin/form_spectateur", name="admin_form_spectateur")
     */
    public function AdminSpectateurFormAction(Request $request)
    {
        // création Entité "Spectateur"
        $form= $this->createForm(SpectateurType::class, new Spectateur);


        //saisie des données envoyées (éventuellement le client via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);
        //var_dump($form);die;

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){
            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){
                // récupère données dans Objet/Entité Categorie
                $spectateur = $form->getData();
                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($spectateur);
                // enregistre en BD
                $entityManager->flush();

                return $this->redirectToRoute('admin_spectateurs');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_admin_spectateur.html.twig",
            [
                'formspectateur' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/admin/form_spectacle", name="admin_form_spectacle")
     */
    public function AdminSpectacleFormAction(Request $request)
    {
        // création Entité "Spectacle"
        $form= $this->createForm(SpectacleType::class, new Spectacle);


        //saisie des données envoyées (éventuellement le client via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);
        //var_dump($form);die;

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){
            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){
                // récupère données dans Objet/Entité Categorie
                $spectacle = $form->getData();
                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($spectacle);
                // enregistre en BD
                $entityManager->flush();

                return $this->redirectToRoute('admin_spectacles');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_admin_spectacle.html.twig",
            [
                'formspectacle' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/admin/form_salle", name="admin_form_salle")
     */
    public function AdminSalleFormAction(Request $request)
    {
        // création Entité "Salle"
        $form= $this->createForm(SalleType::class, new Salle);


        //saisie des données envoyées (éventuellement le client via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);
        //var_dump($form);die;

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){
            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){
                // récupère données dans Objet/Entité Categorie
                $salle = $form->getData();
                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($salle);
                // enregistre en BD
                $entityManager->flush();

                return $this->redirectToRoute('admin_salles');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_admin_salle.html.twig",
            [
                'formsalle' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/admin/form_reservation", name="admin_form_reservation")
     */
    public function AdminReservationFormAction(Request $request)
    {
        // création Entité "Reservation"
        $form= $this->createForm(ReservationType::class, new Reservation);

        //saisie des données envoyées (éventuellement) le client via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){
            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){
                // récupère données dans Objet/Entité Categorie
                $reservation = $form->getData();

                $spectateurs = $reservation->getSpectateur();
                $PrixPlaces = 0;
                foreach ($spectateurs as $spectateur){
                    $PrixPlace = $spectateur
                        ->getCategorie()
                        ->getTarif()
                        ->getPrixPlace();
                    $PrixPlaces += $PrixPlace;
                }
                $reservation->setMontantReservation($PrixPlaces);

                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($reservation);
                // enregistre en BD
                $entityManager->flush();

                return $this->redirectToRoute('admin_reservations');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_admin_reservation.html.twig",
            [
                'formreservation' => $form->createView(),
            ]
        );
    }


    /**
     * @Route("/form_reservation/{id}", name="form_reservation")
     */
    public function ReservationFormAction(Request $request, $id)
    {
        // création Entité "Reservation"
        $form= $this->createForm(ReservationClientType::class, new Reservation);

        //saisie des données envoyées (éventuellement le client via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);
        //var_dump($form);die;

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){
            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){
                // récupère données dans Objet/Entité Categorie
                $reservation = $form->getData();

                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                //$client = $this->get('security.context')->getToken()->getUser();

                //$reservation->setClient($client);

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($reservation);
                // enregistre en BD
                $entityManager->flush();

                return $this->redirectToRoute('admin_reservations');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_reservation.html.twig",
            [
                'formreservation' => $form->createView(),
                'id' => $id,
            ]
        );
    }

    /**
     * @Route("/admin/form_client", name="admin_form_client")
     */
    public function AdminClientFormAction(Request $request)
    {
        // création Entité "Client"
        $form= $this->createForm(ClientType::class, new Client);


        //saisie des données envoyées (éventuellement le client via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);
        //var_dump($form);die;

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){
            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){
                // récupère données dans Objet/Entité Categorie
                $client = $form->getData();
                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($client);
                // enregistre en BD
                $entityManager->flush();

                return $this->redirectToRoute('admin_clients');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_admin_client.html.twig",
            [
                'formclient' => $form->createView()
            ]
        );
    }

}