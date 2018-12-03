<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tarif
 *
 * @ORM\Table(name="tarif")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TarifRepository")
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
     * @var int
     *
     * @ORM\Column(name="prix_place", type="decimal", precision=7, scale=2)
     */
    private $prix_place;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Categorie", mappedBy="tarif")
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
     * @return int
     */
    public function getPrixPlace()
    {
        return $this->prix_place;
    }

    /**
     * @param int $prix_place
     */
    public function setPrixPlace($prix_place)
    {
        $this->prix_place = $prix_place;
    }

    //**************************************** getter setter ************************************************
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
