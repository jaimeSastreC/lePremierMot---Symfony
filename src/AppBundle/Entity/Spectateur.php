<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spectateur
 *
 * @ORM\Table(name="spectateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SpectateurRepository")
 */
class Spectateur
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
     * @ORM\Column(name="nom_spectateur", type="string", length=255)
     */
    private $nomSpectateur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_spectateur", type="string", length=255, nullable=true)
     */
    private $prenomSpectateur;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categorie", inversedBy="spectateur")
     */
    private $categorie;

    /**
     * @var
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Reservation", inversedBy="spectateur")
     */
    private $reservation;

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
     * Set nomSpectateur
     *
     * @param string $nomSpectateur
     *
     * @return Spectateur
     */
    public function setNomSpectateur($nomSpectateur)
    {
        $this->nomSpectateur = $nomSpectateur;

        return $this;
    }

    /**
     * Get nomSpectateur
     *
     * @return string
     */
    public function getNomSpectateur()
    {
        return $this->nomSpectateur;
    }

    /**
     * Set prenomSpectateur
     *
     * @param string $prenomSpectateur
     *
     * @return Spectateur
     */
    public function setPrenomSpectateur($prenomSpectateur)
    {
        $this->prenomSpectateur = $prenomSpectateur;

        return $this;
    }

    /**
     * Get prenomSpectateur
     *
     * @return string
     */
    public function getPrenomSpectateur()
    {
        return $this->prenomSpectateur;
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


}

