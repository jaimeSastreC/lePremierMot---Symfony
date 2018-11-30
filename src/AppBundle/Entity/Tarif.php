<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tarif
 *
 * @ORM\Table(name="tarif")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\tarifRepository")
 */
class Tarif
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
     * @var
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Sepctacle", inversedBy="tarif")
     */
    private $spectacle;

    /**
     * @var
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Categorie", inversedBy="tarif")
     */
    private $categorie;

    /**
     * @return mixed
     */
    public function getSpectacle()
    {
        return $this->spectacle;
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
     * @param mixed $spectacle
     */
    public function setSpectacle($spectacle)
    {
        $this->spectacle = $spectacle;
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
