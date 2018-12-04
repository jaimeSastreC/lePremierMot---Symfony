<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Spectacle
 *
 * @ORM\Table(name="spectacle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SpectacleRepository")
 */
class Spectacle
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
     * @var string
     *
     * @ORM\Column(name="nom_spectacle", type="string", length=255)
     */
    private $nomSpectacle;

    /**
     * @Assert\Date
     * @var \DateTime
     *
     * @ORM\Column(name="date_spectacle", type="date", nullable=true)
     */
    private $dateSpectacle;

    /**
     *@Assert\Time
     * @var \DateTime
     *
     * @ORM\Column(name="heure_debut_spectacle", type="time", nullable=true)
     */
    private $heureDebutSpectacle;

    /**
     * @Assert\Time
     * @var \DateTime
     *
     * @ORM\Column(name="heure_fin_spectacle", type="time", nullable=true)
     */
    private $heureFinSpectacle;

    /**
     * //lien many to one création clé étrangère
     * @var
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Salle", inversedBy="spectacle")
     */
    private $salle;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reservation", mappedBy="spectacle")
     */
    private $reservation;

    /**
     * @var
     * @ORM\ManyToMany(targetEntity="Tarif")
     */// TODO OPTION pour pouvoir avoir la liste des tarifs d'un spectacle
    private $tarif;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Categorie", mappedBy="spectacle")
     */
    private $categorie;


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
     * Set nomSpectacle
     *
     * @param string $nomSpectacle
     *
     * @return Spectacle
     */
    public function setNomSpectacle($nomSpectacle)
    {
        $this->nomSpectacle = $nomSpectacle;

        return $this;
    }

    /**
     * Get nomSpectacle
     *
     * @return string
     */
    public function getNomSpectacle()
    {
        return $this->nomSpectacle;
    }

    /**
     * Set dateSpectacle
     *
     * @param \DateTime $dateSpectacle
     *
     * @return Spectacle
     */
    public function setDateSpectacle($dateSpectacle)
    {
        $this->dateSpectacle = $dateSpectacle;

        return $this;
    }

    /**
     * Get dateSpectacle
     *
     * @return \DateTime
     */
    public function getDateSpectacle()
    {
        return $this->dateSpectacle;
    }

    /**
     * Set heureDebutSpectacle
     *
     * @param \DateTime $heureDebutSpectacle
     *
     * @return Spectacle
     */
    public function setHeureDebutSpectacle($heureDebutSpectacle)
    {
        $this->heureDebutSpectacle = $heureDebutSpectacle;

        return $this;
    }

    /**
     * Get heureDebutSpectacle
     *
     * @return \DateTime
     */
    public function getHeureDebutSpectacle()
    {
        return $this->heureDebutSpectacle;
    }

    /**
     * Set heureFinSpectacle
     *
     * @param \DateTime $heureFinSpectacle
     *
     * @return Spectacle
     */
    public function setHeureFinSpectacle($heureFinSpectacle)
    {
        $this->heureFinSpectacle = $heureFinSpectacle;

        return $this;
    }

    /**
     * Get heureFinSpectacle
     *
     * @return \DateTime
     */
    public function getHeureFinSpectacle()
    {
        return $this->heureFinSpectacle;
    }

    /**
     * Set salle
     *
     * @param string $salle
     *
     * @return Spectacle
     */
    public function setSalle($salle)
    {
        $this->salle = $salle;

        return $this;
    }

    /**
     * Get salle
     *
     * @return string
     */
    public function getSalle()
    {
        return $this->salle;
    }

    /**
     * @return mixed
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * @param mixed $reservation
     */
    public function setReservation($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * @return mixed
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * @param mixed $tarif
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }


}

