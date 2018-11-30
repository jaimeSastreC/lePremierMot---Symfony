<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientRepository")
 */
class Client
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
     * @ORM\Column(name="civilite_client", type="string", length=3, nullable=true)
     *
     */
    private $civiliteClient;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_client", type="string", length=50)
     * @Assert\Length(
     *  min = 3,
     *  max = 50,
     * minMessage = "Your first name must be at least {{ limit }} characters long",
     * maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $nomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_client", type="string", length=50)
     * @Assert\Length(
     *  min = 3,
     *  max = 50,
     * minMessage = "Your first name must be at least {{ limit }} characters long",
     * maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $prenomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_client", type="string", length=255, nullable=true)
     */
    private $adresseClient;

    /**
     * @var string
     *
     * @ORM\Column(name="cp_client", type="string", length=15, nullable=true)
     */
    private $cpClient;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_client", type="string", length=15, nullable=true)
     */
    private $telClient;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_client", type="string", length=255)
     */
    private $mailClient;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reservation", mappedBy="client")
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
     * Set civiliteClient
     *
     * @param string $civiliteClient
     *
     * @return Client
     */
    public function setCiviliteClient($civiliteClient)
    {
        $this->civiliteClient = $civiliteClient;

        return $this;
    }

    /**
     * Get civiliteClient
     *
     * @return string
     */
    public function getCiviliteClient()
    {
        return $this->civiliteClient;
    }

    /**
     * Set nomClient
     *
     * @param string $nomClient
     *
     * @return Client
     */
    public function setNomClient($nomClient)
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    /**
     * Get nomClient
     *
     * @return string
     */
    public function getNomClient()
    {
        return $this->nomClient;
    }

    /**
     * Set prenomClient
     *
     * @param string $prenomClient
     *
     * @return Client
     */
    public function setPrenomClient($prenomClient)
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    /**
     * Get prenomClient
     *
     * @return string
     */
    public function getPrenomClient()
    {
        return $this->prenomClient;
    }

    /**
     * Set adresseClient
     *
     * @param string $adresseClient
     *
     * @return Client
     */
    public function setAdresseClient($adresseClient)
    {
        $this->adresseClient = $adresseClient;

        return $this;
    }

    /**
     * Get adresseClient
     *
     * @return string
     */
    public function getAdresseClient()
    {
        return $this->adresseClient;
    }

    /**
     * Set cpClient
     *
     * @param string $cpClient
     *
     * @return Client
     */
    public function setCpClient($cpClient)
    {
        $this->cpClient = $cpClient;

        return $this;
    }

    /**
     * Get cpClient
     *
     * @return string
     */
    public function getCpClient()
    {
        return $this->cpClient;
    }

    /**
     * Set telClient
     *
     * @param string $telClient
     *
     * @return Client
     */
    public function setTelClient($telClient)
    {
        $this->telClient = $telClient;

        return $this;
    }

    /**
     * Get telClient
     *
     * @return string
     */
    public function getTelClient()
    {
        return $this->telClient;
    }

    /**
     * Set mailClient
     *
     * @param string $mailClient
     *
     * @return Client
     */
    public function setMailClient($mailClient)
    {
        $this->mailClient = $mailClient;

        return $this;
    }

    /**
     * Get mailClient
     *
     * @return string
     */
    public function getMailClient()
    {
        return $this->mailClient;
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

