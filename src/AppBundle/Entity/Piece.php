<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Piece
 *
 * @ORM\Table(name="piece")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PieceRepository")
 */
class Piece
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
     * @ORM\Column(name="titre", type="string", length=150)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="accroche", type="string", length=150)
     */
    private $accroche;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=255)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=255)
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="participants", type="string", length=255)
     */
    private $participants;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="string", length=3000)
     */
    private $resume;

    /**
     * @var string
     *
     * @ORM\Column(name="dates", type="string", length=255)
     */
    private $dates;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    //*************************************** Getter Setter *************************************************
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Piece
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return string
     */
    public function getAccroche()
    {
        return $this->accroche;
    }

    /**
     * @param string $accroche
     */
    public function setAccroche(string $accroche)
    {
        $this->accroche = $accroche;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     *
     * @return Piece
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return Piece
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @return string
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * @param string $participants
     */
    public function setParticipants(string $participants)
    {
        $this->participants = $participants;
    }

    /**
     * Set resume
     *
     * @param string $resume
     *
     * @return Piece
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set dates
     *
     * @param string $dates
     *
     * @return Piece
     */
    public function setDates($dates)
    {
        $this->dates = $dates;

        return $this;
    }

    /**
     * Get dates
     *
     * @return string
     */
    public function getDates()
    {
        return $this->dates;
    }


    /**
     * Set image
     *
     * @param string $image
     *
     * @return Piece
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}

