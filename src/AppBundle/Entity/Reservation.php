<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reservation", type="date")
     * @Assert\Date
     *
     */
    private $dateReservation;

    /**
     * @var int
     *
     * @ORM\Column(name="montant_reservation", type="decimal", precision=7, scale=2)
     *
     */
    private $montantReservation;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Spectacle", inversedBy="reservation")
     */
    private $spectacle;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client", inversedBy="reservation")
     */
    private $client;

    /**
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Spectateur", mappedBy="reservation", cascade={"persist"})
     */
    private $spectateur;

    //***************************************Constructor*************************************************

    public function __construct()
    {
        $this->dateReservation = new \DateTime('now');

        $this->spectateur = new ArrayCollection();
        $this->updateMontantReservation();
    }

    //***************************************methode calcul montant total des réservations*************************************************

    private function calculMontant(){
        $spectateurs = $this->getSpectateur();
        $PrixPlaces = 0;
        foreach ($spectateurs as $spectateur){
            $PrixPlace = $spectateur
                ->getCategorie()
                ->getTarif()
                ->getPrixPlace();
            $PrixPlaces += $PrixPlace;
            //utilise getter pour ajouter le montant calculé à la $reservation
            return $PrixPlaces;
        }
    }
    //***************************************Getter Setter*************************************************

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateReservation
     *
     * @param \DateTime $dateReservation
     *
     * @return Reservation
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * Get dateReservation
     *
     * @return \DateTime
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * @return int
     */
    public function getMontantReservation(): int
    {
        return $this->montantReservation;
    }

    /**
     * @return int
     */
    public function setMontantReservation($montantReservation): void
    {
        $this->montantReservation = $montantReservation;
    }

    /**
     * @return int
     */
    public function updateMontantReservation(): void
    {
        $this->montantReservation = $this->calculMontant();
    }



    /**
     * @return mixed
     */
    public function getSpectacle()
    {
        return $this->spectacle;
    }

    /**
     * @param mixed $spectacle
     */
    public function setSpectacle($spectacle)
    {
        $this->spectacle = $spectacle;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    public function addSpectacteur(Spectateur $spectateur)
    {
        $this->spectateur[] = $spectateur;
        return $this;
    }


    public function removeSpectateur(Spectateur $spectateur)
    {
        $this->spectateur->removeElement($spectateur);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSpectateur()
    {
        return $this->spectateur;
    }


}

