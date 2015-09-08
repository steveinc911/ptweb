<?php

namespace PartyTribe\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gallery
 *
 * @ORM\Table(name="gallery")
 * @ORM\Entity
 */
class Gallery
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="is_main_gallery", type="string", length=255, nullable=true)
     */
    private $isMainGallery;

    /**
     * @var integer
     *
     * @ORM\Column(name="item_type", type="integer", nullable=true)
     */
    private $itemType;

    /**
     * @var integer
     *
     * @ORM\Column(name="item_id", type="integer", nullable=true)
     */
    private $itemId;

    /**
     * @var integer
     *
     * @ORM\Column(name="gallery_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $galleryId;



    /**
     * Set title
     *
     * @param string $title
     * @return Gallery
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Gallery
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set isMainGallery
     *
     * @param string $isMainGallery
     * @return Gallery
     */
    public function setIsMainGallery($isMainGallery)
    {
        $this->isMainGallery = $isMainGallery;

        return $this;
    }

    /**
     * Get isMainGallery
     *
     * @return string 
     */
    public function getIsMainGallery()
    {
        return $this->isMainGallery;
    }

    /**
     * Set itemType
     *
     * @param integer $itemType
     * @return Gallery
     */
    public function setItemType($itemType)
    {
        $this->itemType = $itemType;

        return $this;
    }

    /**
     * Get itemType
     *
     * @return integer 
     */
    public function getItemType()
    {
        return $this->itemType;
    }

    /**
     * Set itemId
     *
     * @param integer $itemId
     * @return Gallery
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * Get itemId
     *
     * @return integer 
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Get galleryId
     *
     * @return integer 
     */
    public function getGalleryId()
    {
        return $this->galleryId;
    }
}
