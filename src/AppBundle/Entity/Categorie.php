<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategorieRepository")
 */
class Categorie
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
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @var
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Spectateur", inversedBy="categorie")
     */
    private $spectateur;

    /**
     * @var
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tarif", inversedBy="caterorie")
     */
    private $spectacle;

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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Categorie
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
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


}

