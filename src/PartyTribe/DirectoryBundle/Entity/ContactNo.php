<?php

namespace PartyTribe\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactNo
 *
 * @ORM\Table(name="contact_no", indexes={@ORM\Index(name="fk_ContactNo_Venue_1", columns={"contact_info_id"})})
 * @ORM\Entity
 */
class ContactNo
{
    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=15)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $number;

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
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set contactInfo
     *
     * @param \PartyTribe\DirectoryBundle\Entity\ContactInfo $contactInfo
     * @return ContactNo
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
