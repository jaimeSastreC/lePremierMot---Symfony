<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageGallerie
 *
 * @ORM\Table(name="image_gallerie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImageGallerieRepository")
 */
class ImageGallerie
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
     * @ORM\Column(name="nom_image", type="string", length=255, nullable=true)
     */
    private $nomImage;

    /**
     * @var string
     *
     * @ORM\Column(name="alt_image", type="string", length=255)
     */
    private $altImage;

    /**
     * @var string
     *
     * @ORM\Column(name="legende_image", type="string", length=255)
     */
    private $legendeImage;

// ****************************** getter setter ***********************************
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
     * Set nomImage
     *
     * @param string $nomImage
     *
     * @return ImageGallerie
     */
    public function setNomImage($nomImage)
    {
        $this->nomImage = $nomImage;

        return $this;
    }

    /**
     * Get nomImage
     *
     * @return string
     */
    public function getNomImage()
    {
        return $this->nomImage;
    }

    /**
     * Set altImage
     *
     * @param string $altImage
     *
     * @return ImageGallerie
     */
    public function setAltImage($altImage)
    {
        $this->altImage = $altImage;

        return $this;
    }

    /**
     * Get altImage
     *
     * @return string
     */
    public function getAltImage()
    {
        return $this->altImage;
    }

    /**
     * Set legendeImage
     *
     * @param string $legendeImage
     *
     * @return ImageGallerie
     */
    public function setLegendeImage($legendeImage)
    {
        $this->legendeImage = $legendeImage;

        return $this;
    }

    /**
     * Get legendeImage
     *
     * @return string
     */
    public function getLegendeImage()
    {
        return $this->legendeImage;
    }
}

