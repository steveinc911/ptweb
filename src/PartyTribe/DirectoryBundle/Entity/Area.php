<?php

namespace PartyTribe\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Area
 *
 * @ORM\Table(name="area", indexes={@ORM\Index(name="fk_Area_City_1", columns={"city_id"})})
 * @ORM\Entity
 */
class Area
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="area_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $areaId;

    /**
     * @var \PartyTribe\DirectoryBundle\Entity\City
     *
     * @ORM\ManyToOne(targetEntity="PartyTribe\DirectoryBundle\Entity\City")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city_id", referencedColumnName="city_id")
     * })
     */
    private $city;



    /**
     * Set name
     *
     * @param string $name
     * @return Area
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
     * Get areaId
     *
     * @return integer 
     */
    public function getAreaId()
    {
        return $this->areaId;
    }

    /**
     * Set city
     *
     * @param \PartyTribe\DirectoryBundle\Entity\City $city
     * @return Area
     */
    public function setCity(\PartyTribe\DirectoryBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \PartyTribe\DirectoryBundle\Entity\City 
     */
    public function getCity()
    {
        return $this->city;
    }
}
