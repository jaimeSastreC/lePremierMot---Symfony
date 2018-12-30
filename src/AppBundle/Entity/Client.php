<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientRepository")
 * @UniqueEntity("mailClient", message="Ce email est déjà enregsitrer,
 * veuillez vous connecter ou vous enregistrer avec un autre email, merci")
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
     * @ORM\Column(name="civilite_client", type="string", length=4, nullable=true)
     * @Assert\Choice({"Mlle", "Mme", "M"})
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
     * minMessage = "Votre nom doit avoir au moins {{ limit }} caractères",
     * maxMessage = "Votre nom doit avoir au plus {{ limit }} caractères"
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
     * minMessage = "Votre prénom doit avoir au moins {{ limit }} caractères",
     * maxMessage = "Votre prénom doit avoir au plus {{ limit }} caractères"
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
     * @ORM\Column(name="cp_client", type="integer", length=15, nullable=true)
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $cpClient;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_client", type="string", length=10, nullable=true)
     */
    private $villeClient;

    /**
     * @ORM\Column(name="pays_client", type="string", length=50, nullable=true)
     *
     */
    private $paysClient;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_client", type="string", length=15, nullable=true)
     * @Assert\Length(
     *  min = 8,
     *  max = 15,
     * minMessage = "Votre numéro de tel doit avoir au moins {{ limit }} chiffres",
     * maxMessage = "Votre numéro de tel doit avoir au plus {{ limit }} chiffres"
     * )
     */
    private $telClient;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_client", type="string", length=255)
     *
     * @Assert\Email(
     *     message = "l'email '{{ value }}' n'est pas un email valide.",
     *     checkHost = true
     * )
     */
    private $mailClient;

    /**
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reservation", mappedBy="client")
     *
     */
    private $reservation;

    //***************************************Constructor*************************************************

    public function __construct()
    {

        $this->reservation = new ArrayCollection();
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
     * @return string
     */
    public function getVilleClient()
    {
        return $this->villeClient;
    }

    /**
     * @param string $villeClient
     */
    public function setVilleClient($villeClient)
    {
        $this->villeClient = $villeClient;
    }

    /**
     * @return mixed
     */
    public function getPaysClient()
    {
        return $this->paysClient;
    }

    /**
     * @param mixed $paysClient
     */
    public function setPaysClient($paysClient): void
    {
        $this->paysClient = $paysClient;
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
     *
     *
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
    public function addReservation(Reservation $reservation)
    {
        $this->reservation[] = $reservation;
    }

    //option remove reservation, ne sera pas utilisé pour raison de sécurité

    public function setReservation(\Doctrine\Common\Collections\Collection $reservation)
    {
        $this->reservation = $reservation;
    }
}
