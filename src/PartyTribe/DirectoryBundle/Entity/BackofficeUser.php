<?php

namespace PartyTribe\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BackofficeUser
 *
 * @ORM\Table(name="backoffice_user", indexes={@ORM\Index(name="fk_BackofficeUser_ContactInfo_1", columns={"contact_info_id"}), @ORM\Index(name="fk_backoffice_user_user_type_1", columns={"user_type_id"})})
 * @ORM\Entity
 */
class BackofficeUser
{
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="security_question", type="string", length=255, nullable=true)
     */
    private $securityQuestion;

    /**
     * @var string
     *
     * @ORM\Column(name="security_answer", type="string", length=255, nullable=true)
     */
    private $securityAnswer;

    /**
     * @var integer
     *
     * @ORM\Column(name="backoffice_user_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $backofficeUserId;

    /**
     * @var \PartyTribe\DirectoryBundle\Entity\UserType
     *
     * @ORM\ManyToOne(targetEntity="PartyTribe\DirectoryBundle\Entity\UserType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_type_id", referencedColumnName="user_type_id")
     * })
     */
    private $userType;

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
     * Set username
     *
     * @param string $username
     * @return BackofficeUser
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return BackofficeUser
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set securityQuestion
     *
     * @param string $securityQuestion
     * @return BackofficeUser
     */
    public function setSecurityQuestion($securityQuestion)
    {
        $this->securityQuestion = $securityQuestion;

        return $this;
    }

    /**
     * Get securityQuestion
     *
     * @return string 
     */
    public function getSecurityQuestion()
    {
        return $this->securityQuestion;
    }

    /**
     * Set securityAnswer
     *
     * @param string $securityAnswer
     * @return BackofficeUser
     */
    public function setSecurityAnswer($securityAnswer)
    {
        $this->securityAnswer = $securityAnswer;

        return $this;
    }

    /**
     * Get securityAnswer
     *
     * @return string 
     */
    public function getSecurityAnswer()
    {
        return $this->securityAnswer;
    }

    /**
     * Get backofficeUserId
     *
     * @return integer 
     */
    public function getBackofficeUserId()
    {
        return $this->backofficeUserId;
    }

    /**
     * Set userType
     *
     * @param \PartyTribe\DirectoryBundle\Entity\UserType $userType
     * @return BackofficeUser
     */
    public function setUserType(\PartyTribe\DirectoryBundle\Entity\UserType $userType = null)
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * Get userType
     *
     * @return \PartyTribe\DirectoryBundle\Entity\UserType 
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * Set contactInfo
     *
     * @param \PartyTribe\DirectoryBundle\Entity\ContactInfo $contactInfo
     * @return BackofficeUser
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
