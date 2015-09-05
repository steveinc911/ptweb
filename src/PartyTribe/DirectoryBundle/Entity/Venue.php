<?php

namespace PartyTribe\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Venue
 *
 * @ORM\Table(name="venue", indexes={@ORM\Index(name="fk_Venue_Company_1", columns={"company_id"}), @ORM\Index(name="fk_Venue_Location_1", columns={"location_id"})})
 * @ORM\Entity
 */
class Venue
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="category_id", type="integer", nullable=true)
     */
    private $categoryId;

    /**
     * @var string
     *
     * @ORM\Column(name="capacity", type="string", length=255, nullable=true)
     */
    private $capacity;

    /**
     * @var string
     *
     * @ORM\Column(name="dresscode_tags", type="string", length=255, nullable=true)
     */
    private $dresscodeTags;

    /**
     * @var string
     *
     * @ORM\Column(name="genre_tags", type="string", length=255, nullable=true)
     */
    private $genreTags;

    /**
     * @var integer
     *
     * @ORM\Column(name="venue_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $venueId;

    /**
     * @var \PartyTribe\DirectoryBundle\Entity\Location
     *
     * @ORM\ManyToOne(targetEntity="PartyTribe\DirectoryBundle\Entity\Location")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="location_id", referencedColumnName="location_id")
     * })
     */
    private $location;

    /**
     * @var \PartyTribe\DirectoryBundle\Entity\Company
     *
     * @ORM\ManyToOne(targetEntity="PartyTribe\DirectoryBundle\Entity\Company")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="company_id", referencedColumnName="company_id")
     * })
     */
    private $company;



    /**
     * Set name
     *
     * @param string $name
     * @return Venue
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set categoryId
     *
     * @param integer $categoryId
     * @return Venue
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set capacity
     *
     * @param string $capacity
     * @return Venue
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return string 
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set dresscodeTags
     *
     * @param string $dresscodeTags
     * @return Venue
     */
    public function setDresscodeTags($dresscodeTags)
    {
        $this->dresscodeTags = $dresscodeTags;

        return $this;
    }

    /**
     * Get dresscodeTags
     *
     * @return string 
     */
    public function getDresscodeTags()
    {
        return $this->dresscodeTags;
    }

    /**
     * Set genreTags
     *
     * @param string $genreTags
     * @return Venue
     */
    public function setGenreTags($genreTags)
    {
        $this->genreTags = $genreTags;

        return $this;
    }

    /**
     * Get genreTags
     *
     * @return string 
     */
    public function getGenreTags()
    {
        return $this->genreTags;
    }

    /**
     * Get venueId
     *
     * @return integer 
     */
    public function getVenueId()
    {
        return $this->venueId;
    }

    /**
     * Set location
     *
     * @param \PartyTribe\DirectoryBundle\Entity\Location $location
     * @return Venue
     */
    public function setLocation(\PartyTribe\DirectoryBundle\Entity\Location $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \PartyTribe\DirectoryBundle\Entity\Location 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set company
     *
     * @param \PartyTribe\DirectoryBundle\Entity\Company $company
     * @return Venue
     */
    public function setCompany(\PartyTribe\DirectoryBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \PartyTribe\DirectoryBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }
}
