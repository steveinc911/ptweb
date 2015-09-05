<?php

namespace PartyTribe\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photo
 *
 * @ORM\Table(name="photo", indexes={@ORM\Index(name="fk_Photo_Gallery_1", columns={"gallery_id"})})
 * @ORM\Entity
 */
class Photo
{
    /**
     * @var string
     *
     * @ORM\Column(name="caption", type="string", length=255, nullable=true)
     */
    private $caption;

    /**
     * @var integer
     *
     * @ORM\Column(name="photo_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $photoId;

    /**
     * @var \PartyTribe\DirectoryBundle\Entity\Gallery
     *
     * @ORM\ManyToOne(targetEntity="PartyTribe\DirectoryBundle\Entity\Gallery")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="gallery_id", referencedColumnName="gallery_id")
     * })
     */
    private $gallery;



    /**
     * Set caption
     *
     * @param string $caption
     * @return Photo
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption
     *
     * @return string 
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Get photoId
     *
     * @return integer 
     */
    public function getPhotoId()
    {
        return $this->photoId;
    }

    /**
     * Set gallery
     *
     * @param \PartyTribe\DirectoryBundle\Entity\Gallery $gallery
     * @return Photo
     */
    public function setGallery(\PartyTribe\DirectoryBundle\Entity\Gallery $gallery = null)
    {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * Get gallery
     *
     * @return \PartyTribe\DirectoryBundle\Entity\Gallery 
     */
    public function getGallery()
    {
        return $this->gallery;
    }
}
