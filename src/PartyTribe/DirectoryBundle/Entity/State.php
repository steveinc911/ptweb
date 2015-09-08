<?php

namespace PartyTribe\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * State
 *
 * @ORM\Table(name="state", indexes={@ORM\Index(name="fk_State_Country_1", columns={"country_id"})})
 * @ORM\Entity
 */
class State
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
     * @ORM\Column(name="state_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stateId;

    /**
     * @var \PartyTribe\DirectoryBundle\Entity\Country
     *
     * @ORM\ManyToOne(targetEntity="PartyTribe\DirectoryBundle\Entity\Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="country_id")
     * })
     */
    private $country;



    /**
     * Set name
     *
     * @param string $name
     * @return State
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
     * Get stateId
     *
     * @return integer 
     */
    public function getStateId()
    {
        return $this->stateId;
    }

    /**
     * Set country
     *
     * @param \PartyTribe\DirectoryBundle\Entity\Country $country
     * @return State
     */
    public function setCountry(\PartyTribe\DirectoryBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \PartyTribe\DirectoryBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }
}
