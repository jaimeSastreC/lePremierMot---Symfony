<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categorie;
use AppBundle\Entity\Client;
use AppBundle\Entity\Piece;
use AppBundle\Entity\Reservation;
use AppBundle\Entity\Salle;
use AppBundle\Entity\Spectacle;
use AppBundle\Entity\Spectateur;
use AppBundle\Entity\Tarif;
use AppBundle\Repository\ClientRepository;
use AppBundle\Repository\ReservationRepository;
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


//**************************************** Requetes Listes ********************************************************

    /**
     * @Route("/admin/tarifs" , name="admin_tarifs")
     */
    public function listAdminTarifsAction(){

        // je genère le Repository de Doctrine
        $tarifRepository = $this->getDoctrine()->getRepository(Tarif::class);

        //appel de l'ensemble des auteurs
        $tarifs = $tarifRepository->findAll();

        //retourne la page html tarifs en utilisant le twig tarifs.html.twig
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

        //retourne la page html reservations en utilisant le twig categories
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

        //retourne la page html spectacles en utilisant le twig spectateurs
        return $this->render("@App/Pages/spectateurs_admin.html.twig",
            [
                'spectateurs' => $spectateurs
            ]);
    }

    /**
     * @Route("/admin/salles" , name="admin_salles")
     */
    public function listAdminSallesAction(){

        // je genère le Repository de Doctrine
        $salleRepository = $this->getDoctrine()->getRepository(Salle::class);

        //requete sur l'ensemble des salle
        $salles = $salleRepository->findAll();

        //retourne la page html spectacles en utilisant le twig salles
        return $this->render("@App/Pages/salles_admin.html.twig",
            [
                'salles' => $salles
            ]);
    }

    /**
     * @Route("/admin/reservations" , name="admin_reservations")
     */
    public function listAdminReservationsAction(){

        // je genère le Repository de Doctrine
        $reservationRepository = $this->getDoctrine()->getRepository(Reservation::class);

        //requete sur l'ensemble des reservations
        $reservations = $reservationRepository->findAll();


        //retourne la page html spectacles en utilisant le twig reservations
        return $this->render("@App/Pages/reservations_admin.html.twig",
            [
                'reservations' => $reservations
            ]);
    }

    /**
     * @Route("/admin/reservations_spectacle/{spectacle}" , name="admin_reservations_spectacle")
     */
    public function listAdminReservationsSpectacleAction($spectacle){

        // je genère le Repository de Doctrine
        $reservationRepository = $this->getDoctrine()->getRepository(Reservation::class);

        /** @var $reservationRepository ReservationRepository */ // je génère une requête par spectacle
        $reservations = $reservationRepository->getReservationBySpectacle($spectacle);


        //retourne la page html spectacles en utilisant le twig reservations
        return $this->render("@App/Pages/reservations_admin.html.twig",
            [
                'reservations' => $reservations
            ]);
    }


    /**
     * @Route("/admin/spectacles" , name="admin_spectacles")
     */
    public function listAdminSpectaclesAction(){

        // je genère le Repository de Doctrine
        $spectacleRepository = $this->getDoctrine()->getRepository(Spectacle::class);

        //requete sur l'ensemble des spectacles
        $spectacles = $spectacleRepository->findAll();

        //retourne la page html spectacles en utilisant le twig spectacles
        return $this->render("@App/Pages/spectacles_admin.html.twig",
            [
                'spectacles' => $spectacles
            ]);
    }

    /**
     * @Route("/admin/clients" , name="admin_clients")
     */
    public function listAdminClientsAction(){

        // je genère le Repository de Doctrine
        $spectacleRepository = $this->getDoctrine()->getRepository(Client::class);

        //requete sur l'ensemble des clients
        $clients = $spectacleRepository->findAll();

        //retourne la page html clients en utilisant le twig clients
        return $this->render("@App/Pages/clients_admin.html.twig",
            [
                'clients' => $clients
            ]);
    }

    /**
     * @Route("/admin/pieces" , name="admin_pieces")
     */
    public function listAdminPiecesAction(){

        // je genère le Repository de Doctrine
        $pieceRepository = $this->getDoctrine()->getRepository(Piece::class);

        //requete sur l'ensemble des catégories
        $pieces = $pieceRepository->findAll();

        //retourne la page html reservations en utilisant le twig pieces
        return $this->render("@App/Pages/pieces_admin.html.twig",
            [
                'pieces' => $pieces
            ]);
    }

//**************************************** Requete Unique ********************************************************
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

        //requete sur Entity Categorie avec $id
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

        //requete sur Entity Salle avec $id
        $salle = $repository->find($id);

        //retourne la page html salle en utiliasnt le twig salle
        return $this->render("@App/Pages/salle_admin.html.twig",
            [
                'salle' => $salle
            ]);
    }

    /**
     * @Route("/admin/spectacle/{id}" , name="admin_spectacle", defaults={"id"= 1 })
     */
    public function AdminSpectacleAction($id){

        // je genère le Repository de Doctrine
        $repository = $this->getDoctrine()->getRepository(Spectacle::class);

        //requete sur Entity Spectacle avec $id
        $spectacle = $repository->find($id);

        //retourne la page html spectacle en utiliasnt le twig spectacle
        return $this->render("@App/Pages/spectacle_admin.html.twig",
            [
                'spectacle' => $spectacle
            ]);
    }

    /**
     * @Route("/admin/reservation/{id}" , name="admin_reservation", defaults={"id"= 1 })
     */
    public function AdminReservationAction($id){

        // je genère le Repository de Doctrine
        $repository = $this->getDoctrine()->getRepository(Reservation::class);

        //requete sur Entity Reservation avec $id
        $reservation = $repository->find($id);

        //retourne la page html reservation en utiliasnt le twig reservation
        return $this->render("@App/Pages/reservation_admin.html.twig",
            [
                'reservation' => $reservation
            ]);
    }

    /**
     * @Route("/admin/piece/{id}" , name="admin_piece", defaults={"id"= 1 })
     */
    public function listAdminPieceAction($id){

        // je genère le Repository de Doctrine
        $pieceRepository = $this->getDoctrine()->getRepository(Piece::class);

        //requete sur l'ensemble des catégories
        $piece = $pieceRepository->find($id);

        //retourne la page html reservations en utilisant le twig pieces
        return $this->render("@App/Pages/piece_admin.html.twig",
            [
                'piece' => $piece
            ]);
    }

    //************************************** Requetes ciblées ex: nom client , id reservation ********************************************
    /**
     * @Route("/reservation" , name="reservation")
     */
    public function ReservationAction(Request $request){

        //Récupération de reservation_id de la session
        $reservation_id = $this->get('session')->get('reservation_id');

        // je genère le Repository de Doctrine
        $repository = $this->getDoctrine()->getRepository(Reservation::class);

        //requete sur Entity Reservation avec $id
        $reservation = $repository->find($reservation_id);
        $client_id = $reservation->getClient()->getId();

        //retourne la page html reservation en utiliasnt le twig reservation
        return $this->render("@App/Pages/reservation.html.twig",
            [
                'reservation' => $reservation,
                'id' => $reservation_id,
                'client' => $client_id,
            ]
        );
    }

    /**
     * @Route("/reservations", name="reservations_client")
     */
    public function requeteReservationsAction(Request $request){

        //Récupération de client_id de la session
        $client_id = $this->get('session')->get('client_id');

        /** @var $reservationRepository ReservationRepository */
        $reservationRepository = $this->getDoctrine()->getRepository(Reservation::class);

        /*création d'une méthode spcifique pour une requête ciblé sur le client -> voir Repository*/
        $reservations = $reservationRepository->getReservationByClient($client_id);

        //retourne la page html auteurs en utiliasnt le twig reservations_admin.html.twig
        return $this->render("@App/Pages/reservations.html.twig",
            [
                'reservations' => $reservations,
                'client' => $client_id,
            ]);
    }

    //méthode puissante qui fait une recherche à partir d'un mot clé sur Twig> Form > name -> requete get
    /**
     * @Route("/admin/client_reservations/searchName", name="client_reservation_search_name")
     */
    public function requeteReservationsClientAction(Request $request){
        //Request $request crée l'objet, géré par Symfony
        //récupère dans le Form le GET.

        $name = $request->query->get('searchName');

        /** @var $reservationRepository ReservationRepository */
        $reservationRepository = $this->getDoctrine()->getRepository(Reservation::class);

        // méthode crée puissante => voir repository!!
        $reservations = $reservationRepository->getClientReservation($name);

        //dump($reservations);die;
        //retourne la page html reservations en utiliasnt le twig reservations.html.twig
        return $this->render("@App/Pages/reservations_admin.html.twig",
            [
                'reservations' => $reservations
            ]);
    }

    /**
     * @Route("/payement",name="payer_reservation")
     */
    public function payerReservationAction(Request $request){
        /*méthode en construction , car doit être vue avec le client; Ici je valide automatiquement
        pour montrer le changement de statut, mais il ne se fera que après contrôle de payement.*/

        //récupération id réservation
        $reservation_id = $this->get('session')->get('reservation_id');


        // je genère le Repository de Doctrine
        /** @var $repository ReservationRepository*/
        $repository = $this->getDoctrine()->getRepository(Reservation::class);

        //avec le repository je récupère dans la BD reservation sous forme d'Identity (instance)
        $reservation = $repository->find($reservation_id);

        //changement de statut de validation de payement
        $reservation->setValideReservation('oui');
        $reservation->setModePayementReservation('paypal');

        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        // j'enregistre en base de donnée, persist met dans zone tampon provisoire de l'unité de travail
        $entityManager->persist($reservation);

        //mise à jour BD, envoy à bd
        $entityManager->flush();

        return $this->render("@App/Pages/paypal.html.twig");
    }

}