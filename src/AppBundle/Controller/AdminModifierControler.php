<?php


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
use AppBundle\Repository\CategorieRepository;
use AppBundle\Repository\ClientRepository;
use AppBundle\Repository\ReservationRepository;
use AppBundle\Repository\SalleRepository;
use AppBundle\Repository\SpectacleRepository;
use AppBundle\Repository\SpectateurRepository;
use AppBundle\Repository\TarifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminModifierControler extends Controller
{
    /**
     *@Route("/admin/tarif_modifier/{id}", name="admin_modif_tarif")
     */
    public function tarifAdminModifAction(Request $request, $id)
    {
        //var_dump($id);die;
        // je genère le Repository de Doctrine
        /** @var $repository TarifRepository */
        $repository = $this->getDoctrine()->getRepository(Tarif::class);

        //avec le repository je récupère dans la BD l'auteur sous forme d'Identity (instance)
        $tarif = $repository->find($id);

        //recherche entité TarifType abstraite pour créé la forme de Tarif avec pour objet parametre $tarif
        $form = $this->createForm(TarifType::class, $tarif);

        // associe les données envoyées (éventuellement) par le client via le formulaire
        //à notre variable $form. Donc la variable $form contient maintenant aussi le $_POST
        //handlerequest reremplit le formulaire, récupère les données et les reinjecte dans formulaire
        $form->handleRequest($request);

        //isSubmitted vérifie si il y a bien un contenu form envoyé, puis on regarde si valide
        if ($form->isSubmitted()){
            if ($form->isValid()) {

                // récupère données dans Objet/Entité Tarif
                $tarif = $form->getData();

                // je récupère l'entity manager de doctrine
                $entityManager = $this->getDoctrine()->getManager();

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
                //affiche le message flash
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
    public function categorieAdminModifAction(Request $request, $id)
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

    /**
     *@Route("/admin/spectateur_modifier/{id}", name="admin_modif_spectateur")
     */
    public function spectateurAdminModifAction(Request $request, $id)
    {
        //var_dump($id);die;
        // je genère le Repository de Doctrine
        /** @var $repository SpectateurRepository */
        $repository = $this->getDoctrine()->getRepository(Spectateur::class);

        //avec le repository je récupère dans la BD spectateur sous forme d'Identity (instance)
        $spectateur = $repository->find($id);

        //recherche entité SpectateurType abstraite pour créé la forme de Spectateur avec pour objet parametre $spectateur TODO
        $form = $this->createForm(SpectateurType::class, $spectateur);

        // associe les données envoyées (éventuellement) par le client via le formulaire
        //à notre variable $form. Donc la variable $form contient maintenant aussi de $_POST
        //handlerequest reremplit le formulaire, récupère données et les reinjecte dans formulaire
        $form->handleRequest($request);

        //isSubmitted vérifie si il y a bien un contenu form envoyé, puis on regarde si valide (à compléter plus tard
        if ($form->isSubmitted()){
            if ($form->isValid()) {

                // récupère données dans Objet/Entité Spectateur
                $spectateur = $form->getData();

                // je récupère l'entity manager de doctrine
                $entityManager = $this->getDoctrine()->getManager();

                // j'enregistre en base de donnée, persist met dans zone tampon provisoire de l'unité de travail
                $entityManager->persist($spectateur);
                //mise à jour BD, envoy à bd
                $entityManager->flush();

                // Renvoi de confirmation d'enregistrement Message flash
                $this->addFlash(
                    'notice',
                    'Votre Spectateur a bien été ajouté!'
                );

                // Important : redirige vers la route demandée, avec name = 'admin_spectateurs'
                return $this->redirectToRoute('admin_spectateurs');
            } else {
                $this->addFlash(
                    'notice',
                    'Votre Spectateur n\'a pas été enregistré, erreur!'
                );
            }
        }

        return $this->render(
            "@App/Pages/form_admin_spectateur.html.twig",
            [
                'formspectateur' => $form->createView()
            ]
        );
    }

    /**
     *@Route("/admin/salle_modifier/{id}", name="admin_modif_salle")
     */
    public function salleAdminModifAction(Request $request, $id)
    {
        //var_dump($id);die;
        // je genère le Repository de Doctrine
        /** @var $repository SalleRepository*/
        $repository = $this->getDoctrine()->getRepository(Salle::class);

        //avec le repository je récupère dans la BD salle sous forme d'Identity (instance)
        $salle = $repository->find($id);

        //recherche entité SalleType abstraite pour créé la forme de Salle avec pour objet parametre $salle TODO
        $form = $this->createForm(SalleType::class, $salle);

        // associe les données envoyées (éventuellement) par le client via le formulaire
        //à notre variable $form. Donc la variable $form contient maintenant aussi de $_POST
        //handlerequest reremplit le formulaire, récupère données et les reinjecte dans formulaire
        $form->handleRequest($request);

        //isSubmitted vérifie si il y a bien un contenu form envoyé, puis on regarde si valide (à compléter plus tard
        if ($form->isSubmitted()){
            if ($form->isValid()) {

                // récupère données dans Objet/Entité Salle
                $salle = $form->getData();

                // je récupère l'entity manager de doctrine
                $entityManager = $this->getDoctrine()->getManager();


                // j'enregistre en base de donnée, persist met dans zone tampon provisoire de l'unité de travail
                $entityManager->persist($salle);

                //mise à jour BD, envoy à bd
                $entityManager->flush();

                // Renvoi de confirmation d'enregistrement Message flash
                $this->addFlash(
                    'notice',
                    'Votre Salle a bien été ajouté!'
                );

                // Important : redirige vers la route demandée, avec name = 'admin_salles'
                return $this->redirectToRoute('admin_salles');
            } else {
                $this->addFlash(
                    'notice',
                    'Votre Salle n\'a pas été enregistré, erreur!'
                );
            }
        }

        return $this->render(
            "@App/Pages/form_admin_salle.html.twig",
            [
                'formsalle' => $form->createView()
            ]
        );
    }

    /**
     *@Route("/admin/spectacle_modifier/{id}", name="admin_modif_spectacle")
     */
    public function spectacleAdminModifAction(Request $request, $id)
    {
        //var_dump($id);die;
        // je genère le Repository de Doctrine
        /** @var $repository SpectacleRepository*/
        $repository = $this->getDoctrine()->getRepository(Spectacle::class);

        //avec le repository je récupère dans la BD spectacle sous forme d'Identity (instance)
        $spectacle = $repository->find($id);

        //recherche entité SpectacleType abstraite pour créé la forme de Spectacle avec pour objet parametre $spectacle TODO
        $form = $this->createForm(SpectacleType::class, $spectacle);

        // associe les données envoyées (éventuellement) par le client via le formulaire
        //à notre variable $form. Donc la variable $form contient maintenant aussi de $_POST
        //handlerequest reremplit le formulaire, récupère données et les reinjecte dans formulaire
        $form->handleRequest($request);

        //isSubmitted vérifie si il y a bien un contenu form envoyé, puis on regarde si valide (à compléter plus tard
        if ($form->isSubmitted()){
            if ($form->isValid()) {

                // récupère données dans Objet/Entité Spectacle
                $spectacle = $form->getData();

                // je récupère l'entity manager de doctrine
                $entityManager = $this->getDoctrine()->getManager();


                // j'enregistre en base de donnée, persist met dans zone tampon provisoire de l'unité de travail
                $entityManager->persist($spectacle);

                //mise à jour BD, envoy à bd
                $entityManager->flush();

                // Renvoi de confirmation d'enregistrement Message flash
                $this->addFlash(
                    'notice',
                    'Votre Spectacle a bien été ajouté!'
                );

                // Important : redirige vers la route demandée, avec name = 'admin_spectacles'
                return $this->redirectToRoute('admin_spectacles');
            } else {
                $this->addFlash(
                    'notice',
                    'Votre Spectacle n\'a pas été enregistré, erreur!'
                );
            }
        }

        return $this->render(
            "@App/Pages/form_admin_spectacle.html.twig",
            [
                'formspectacle' => $form->createView()
            ]
        );
    }

    /**
     *@Route("/admin/reservation_modifier/{id}", name="admin_modif_reservation")
     */
    public function reservationAdminModifAction(Request $request, $id)
    {
        // je genère le Repository de Doctrine
        /** @var $repository ReservationRepository*/
        $repository = $this->getDoctrine()->getRepository(Reservation::class);

        //avec le repository je récupère dans la BD reservation sous forme d'Identity (instance)
        $reservation = $repository->find($id);

        //recherche entité ReservationType abstraite pour créé la forme de Reservation avec pour objet parametre $reservation TODO
        $form = $this->createForm(ReservationType::class, $reservation);

        // associe les données envoyées (éventuellement) par le client via le formulaire
        //à notre variable $form. Donc la variable $form contient maintenant aussi de $_POST
        //handlerequest reremplit le formulaire, récupère données et les reinjecte dans formulaire
        $form->handleRequest($request);

        //isSubmitted vérifie si il y a bien un contenu form envoyé, puis on regarde si valide (à compléter plus tard
        if ($form->isSubmitted()){
            if ($form->isValid()) {

                // je récupère l'entity manager de doctrine
                $entityManager = $this->getDoctrine()->getManager();

                // mise à jour du montantReservation
                $spectateurs = $reservation->getSpectateurs();
                $PrixPlaces = 0;
                foreach ($spectateurs as $spectateur) {
                    $PrixPlace = $spectateur
                        ->getCategorie()
                        ->getTarif()
                        ->getPrixPlace();
                    $PrixPlaces += $PrixPlace;
                }
                $reservation->setMontantReservation($PrixPlaces);

                // j'enregistre en base de donnée, persist met dans zone tampon provisoire de l'unité de travail
                $entityManager->persist($reservation);

                //mise à jour BD, envoy à bd
                $entityManager->flush();

                // Renvoi de confirmation d'enregistrement Message flash
                $this->addFlash(
                    'notice',
                    'Votre Reservation a bien été ajouté!'
                );

                // Important : redirige vers la route demandée, avec name = 'admin_reservations'
                return $this->redirectToRoute('admin_reservations');
            } else {

                $this->addFlash(
                    'notice',
                    'Votre Reservation n\'a pas été enregistré, erreur!'
                );
            }
        }

        return $this->render(
            "@App/Pages/form_admin_reservation.html.twig",
            [
                'formreservation' => $form->createView()
            ]
        );
    }

    /**
     *@Route("/reservation_modifier", name="modif_reservation")
     */
    public function reservationModifAction(Request $request)
    {
        // je genère le Repository de Doctrine
        /** @var $repository ReservationRepository*/
        $repository = $this->getDoctrine()->getRepository(Reservation::class);

        //Session Management - Symfony HttpFoundation component
        //Récupération de client_id et reservation_id de la session
        $reservation_id = $this->get('session')->get('reservation_id');
        $client_id = $this->get('session')->get('client_id');

        //avec le repository je récupère dans la BD reservation sous forme d'Identity (instance)
        $reservation = $repository->find($reservation_id);

        //recherche entité ReservationType abstraite pour créé la forme de Reservation avec pour objet parametre $reservation TODO
        $form = $this->createForm(ReservationClientType::class, $reservation, ['id_client'=>$client_id]);

        //dump($form );die;

        // associe les données envoyées (éventuellement) par le client via le formulaire
        //à notre variable $form. Donc la variable $form contient maintenant aussi de $_POST
        //handlerequest reremplit le formulaire, récupère données et les reinjecte dans formulaire
        $form->handleRequest($request);

        //isSubmitted vérifie si il y a bien un contenu form envoyé, puis on regarde si valide (à compléter plus tard
        if ($form->isSubmitted()){
            if ($form->isValid()) {

                // je récupère l'entity manager de doctrine
                $entityManager = $this->getDoctrine()->getManager();

                // mise à jour du montantReservation
                $spectateurs = $reservation->getSpectateurs();
                /*dump($reservation);die;*/

                $PrixPlaces = 0;
                foreach ($spectateurs as $spectateur) {
                    $PrixPlace = $spectateur
                        ->getCategorie()
                        ->getTarif()
                        ->getPrixPlace();
                    $PrixPlaces += $PrixPlace;
                }
                $reservation->setMontantReservation($PrixPlaces);

                // j'enregistre en base de donnée, persist met dans zone tampon provisoire de l'unité de travail
                $entityManager->persist($reservation);

                //mise à jour BD, envoy à bd
                $entityManager->flush();

                // Renvoi de confirmation d'enregistrement Message flash
                $this->addFlash(
                    'notice',
                    'Votre Reservation a bien été ajouté/modifiée!'
                );

                // Important : redirige vers la route demandée, avec name = 'admin_reservations'
                return $this->render("@App/Pages/reservation.html.twig",
                    [
                        'reservation' => $reservation,
                        'id' => $reservation_id,
                        'client' => $client_id,
                    ]);
            } else {

                $this->addFlash(
                    'notice',
                    'Votre Reservation n\'a pas été enregistré, erreur!'
                );
            }
        }

        return $this->render(
            "@App/Pages/form_reservation.html.twig",
            [
                'formreservation' => $form->createView()
            ]
        );
    }

    /**
     *@Route("/admin/client_modifier/{id}", name="admin_modif_client")
     */
    public function clientAdminModifAction(Request $request, $id)
    {
        //var_dump($id);die;
        // je genère le Repository de Doctrine
        /** @var $repository ClientRepository*/
        $repository = $this->getDoctrine()->getRepository(Client::class);

        //avec le repository je récupère dans la BD client sous forme d'Identity (instance)
        $client = $repository->find($id);

        //recherche entité ClientType abstraite pour créé la forme de Client avec pour objet parametre $client TODO
        $form = $this->createForm(ClientType::class, $client);

        // associe les données envoyées (éventuellement) par le client via le formulaire
        //à notre variable $form. Donc la variable $form contient maintenant aussi de $_POST
        //handlerequest reremplit le formulaire, récupère données et les reinjecte dans formulaire
        $form->handleRequest($request);

        //isSubmitted vérifie si il y a bien un contenu form envoyé, puis on regarde si valide (à compléter plus tard
        if ($form->isSubmitted()){
            if ($form->isValid()) {

                // récupère données dans Objet/Entité Client
                $client = $form->getData();

                // je récupère l'entity manager de doctrine
                $entityManager = $this->getDoctrine()->getManager();


                // j'enregistre en base de donnée, persist met dans zone tampon provisoire de l'unité de travail
                $entityManager->persist($client);

                //mise à jour BD, envoy à bd
                $entityManager->flush();

                // Renvoi de confirmation d'enregistrement Message flash
                $this->addFlash(
                    'notice',
                    'Votre Client a bien été ajouté!'
                );

                // Important : redirige vers la route demandée, avec name = 'admin_clients'
                return $this->redirectToRoute('admin_clients');
            } else {
                $this->addFlash(
                    'notice',
                    'Votre Client n\'a pas été enregistré, erreur!'
                );
            }
        }

        return $this->render(
            "@App/Pages/form_admin_client.html.twig",
            [
                'formclient' => $form->createView()
            ]
        );
    }
}