<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Categorie;
use AppBundle\Entity\Client;
use AppBundle\Entity\Contact;
use AppBundle\Entity\ImageGallerie;
use AppBundle\Entity\Piece;
use AppBundle\Entity\Reservation;
use AppBundle\Entity\Spectacle;
use AppBundle\Entity\Spectateur;
use AppBundle\Entity\Tarif;
use AppBundle\Repository\CategorieRepository;
use AppBundle\Repository\ClientRepository;
use AppBundle\Repository\ContactRepository;
use AppBundle\Repository\ImageGallerieRepository;
use AppBundle\Repository\PieceRepository;
use AppBundle\Repository\ReservationRepository;
use AppBundle\Repository\SalleRepository;
use AppBundle\Repository\SpectacleRepository;
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
        /** @var $repository CategorieRepository*/
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
        /** @var $repository SpectacleRepository */
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

    /**
     * @Route("/admin/salle_supprimmer/{id}", name="admin_supp_salle")
     */
    public function salleSuppAction($id){
        // je genère le Repository de Doctrine
        /** @var $repository SalleRepository */
        $repository = $this->getDoctrine()->getRepository(Salle::class);

        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        //avec le repository je récupère dans la BD l'auteur sous forme d'Identity (instance)
        $salle = $repository->find($id);

        // j'utilise la méthode remove du Manager pour effacer l'Entity
        $entityManager->remove($salle);
        // j'enregistre en base de donnée
        $entityManager->flush();

        // Important : redirige vers la route demandée, avec name = 'admin_salle'
        return $this->redirectToRoute('admin_salles');
    }

    /**
     * @Route("/admin/spectacle_supprimmer/{id}", name="admin_supp_spectacle")
     */
    public function spectacleSuppAction($id){
        // je genère le Repository de Doctrine
        /** @var $repository SpectacleRepository */
        $repository = $this->getDoctrine()->getRepository(Spectacle::class);

        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        //avec le repository je récupère dans la BD l'auteur sous forme d'Identity (instance)
        $spectacle = $repository->find($id);

        // j'utilise la méthode remove du Manager pour effacer l'Entity
        $entityManager->remove($spectacle);
        // j'enregistre en base de donnée
        $entityManager->flush();

        // Important : redirige vers la route demandée, avec name = 'admin_spectacle'
        return $this->redirectToRoute('admin_spectacles');
    }

    /**
     * @Route("/admin/reservation_supprimmer/{id}", name="admin_supp_reservation")
     */
    public function reservationSuppAction($id){
        // je genère le Repository de Doctrine
        /** @var $repository ReservationRepository */
        $repository = $this->getDoctrine()->getRepository(Reservation::class);

        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        //avec le repository je récupère dans la BD l'auteur sous forme d'Identity (instance)
        $reservation = $repository->find($id);

        // j'utilise la méthode remove du Manager pour effacer l'Entity
        $entityManager->remove($reservation);
        // j'enregistre en base de donnée
        $entityManager->flush();

        // Important : redirige vers la route demandée, avec name = 'admin_reservation'
        return $this->redirectToRoute('admin_reservations');
    }

    /**
     * @Route("/admin/client_supprimmer/{id}", name="admin_supp_client")
     */
    public function clientSuppAction($id){
        // je genère le Repository de Doctrine
        /** @var $repository ClientRepository */
        $repository = $this->getDoctrine()->getRepository(Client::class);

        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        //avec le repository je récupère dans la BD l'auteur sous forme d'Identity (instance)
        $client = $repository->find($id);

        // j'utilise la méthode remove du Manager pour effacer l'Entity
        $entityManager->remove($client);
        // j'enregistre en base de donnée
        $entityManager->flush();

        // Important : redirige vers la route demandée, avec name = 'admin_client'
        return $this->redirectToRoute('admin_clients');
    }

    /**
     * @Route("/admin/piece_supprimmer/{id}", name="admin_supp_piece")
     */
    public function pieceSuppAction($id){
        // je genère le Repository de Doctrine
        /** @var $repository PieceRepository */
        $repository = $this->getDoctrine()->getRepository(Piece::class);

        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        //avec le repository je récupère dans la BD l'auteur sous forme d'Identity (instance)
        $piece = $repository->find($id);

        // j'utilise la méthode remove du Manager pour effacer l'Entity
        $entityManager->remove($piece);
        // j'enregistre en base de donnée
        $entityManager->flush();

        // Important : redirige vers la route demandée, avec name = 'admin_piece'
        return $this->redirectToRoute('admin_pieces');
    }

    /**
     * @Route("/admin/imageGallerie_supprimmer/{id}", name="admin_supp_imageGallerie")
     */
    public function imageGallerieSuppAction($id){
        // je genère le Repository de Doctrine
        /** @var $repository ImageGallerieRepository */
        $repository = $this->getDoctrine()->getRepository(ImageGallerie::class);

        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        //avec le repository je récupère dans la BD l'auteur sous forme d'Identity (instance)
        $imageGallerie = $repository->find($id);

        // j'utilise la méthode remove du Manager pour effacer l'Entity
        $entityManager->remove($imageGallerie);
        // j'enregistre en base de donnée
        $entityManager->flush();

        // Important : redirige vers la route demandée, avec name = 'admin_imageGallerie'
        return $this->redirectToRoute('admin_galleries');
    }

    /**
     * @Route("/admin/contact_supprimmer/{id}", name="admin_supp_contact")
     */
    public function contactSuppAction($id){
        // je genère le Repository de Doctrine
        /** @var $repository ContactRepository */
        $repository = $this->getDoctrine()->getRepository(Contact::class);

        // je récupère l'entity manager de doctrine
        $entityManager = $this->getDoctrine()->getManager();

        //avec le repository je récupère dans la BD l'auteur sous forme d'Identity (instance)
        $contact = $repository->find($id);

        // j'utilise la méthode remove du Manager pour effacer l'Entity
        $entityManager->remove($contact);
        // j'enregistre en base de donnée
        $entityManager->flush();

        // Important : redirige vers la route demandée, avec name = 'admin_contact'
        return $this->redirectToRoute('admin_contacts');
    }
}