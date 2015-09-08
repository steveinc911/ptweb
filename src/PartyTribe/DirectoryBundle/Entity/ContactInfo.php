<?php

namespace PartyTribe\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactInfo
 *
 * @ORM\Table(name="contact_info")
 * @ORM\Entity
 */
class ContactInfo
{
    /**
     * @var string
     *
     * @ORM\Column(name="contact_name", type="string", length=255, nullable=true)
     */
    private $contactName;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="contact_info_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $contactInfoId;



    /**
     * Set contactName
     *
     * @param string $contactName
     * @return ContactInfo
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;

        return $this;
    }

    /**
     * Get contactName
     *
     * @return string 
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return ContactInfo
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
     * Set email
     *
     * @param string $email
     * @return ContactInfo
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get contactInfoId
     *
     * @return integer 
     */
    public function getContactInfoId()
    {
        return $this->contactInfoId;
    }
}
