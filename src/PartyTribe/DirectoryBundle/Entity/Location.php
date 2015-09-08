<?php

namespace PartyTribe\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="location", indexes={@ORM\Index(name="fk_Location_Area_1", columns={"area_id"})})
 * @ORM\Entity
 */
class Location
{
    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="coordinates", type="string", length=255, nullable=true)
     */
    private $coordinates;

    /**
     * @var integer
     *
     * @ORM\Column(name="location_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $locationId;

    /**
     * @var \PartyTribe\DirectoryBundle\Entity\Area
     *
     * @ORM\ManyToOne(targetEntity="PartyTribe\DirectoryBundle\Entity\Area")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="area_id", referencedColumnName="area_id")
     * })
     */
    private $area;



    /**
     * Set address
     *
     * @param string $address
     * @return Location
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set coordinates
     *
     * @param string $coordinates
     * @return Location
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;

        return $this;
    }

    /**
     * Get coordinates
     *
     * @return string 
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * Get locationId
     *
     * @return integer 
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Set area
     *
     * @param \PartyTribe\DirectoryBundle\Entity\Area $area
     * @return Location
     */
    public function setArea(\PartyTribe\DirectoryBundle\Entity\Area $area = null)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return \PartyTribe\DirectoryBundle\Entity\Area 
     */
    public function getArea()
    {
        return $this->area;
    }
}
