<?php

namespace PartyTribe\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table(name="company", indexes={@ORM\Index(name="fk_Company_ContactInfo_1", columns={"contact_info_id"})})
 * @ORM\Entity
 */
class Company
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
     * @ORM\Column(name="location_id", type="integer", nullable=true)
     */
    private $locationId;

    /**
     * @var integer
     *
     * @ORM\Column(name="company_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $companyId;

    /**
     * @var \PartyTribe\DirectoryBundle\Entity\ContactInfo
     *
     * @ORM\ManyToOne(targetEntity="PartyTribe\DirectoryBundle\Entity\ContactInfo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contact_info_id", referencedColumnName="contact_info_id")
     * })
     */
    private $contactInfo;



    /**
     * Set name
     *
     * @param string $name
     * @return Company
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
     * Set locationId
     *
     * @param integer $locationId
     * @return Company
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;

        return $this;
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
     * Get companyId
     *
     * @return integer 
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * Set contactInfo
     *
     * @param \PartyTribe\DirectoryBundle\Entity\ContactInfo $contactInfo
     * @return Company
     */
    public function setContactInfo(\PartyTribe\DirectoryBundle\Entity\ContactInfo $contactInfo = null)
    {
        $this->contactInfo = $contactInfo;

        return $this;
    }

    /**
     * Get contactInfo
     *
     * @return \PartyTribe\DirectoryBundle\Entity\ContactInfo 
     */
    public function getContactInfo()
    {
        return $this->contactInfo;
    }
}
