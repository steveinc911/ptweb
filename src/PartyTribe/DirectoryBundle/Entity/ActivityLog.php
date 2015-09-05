<?php

namespace PartyTribe\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActivityLog
 *
 * @ORM\Table(name="activity_log", indexes={@ORM\Index(name="fk_ActivityLog_BackofficeUser_1", columns={"backoffice_user_id"})})
 * @ORM\Entity
 */
class ActivityLog
{
    /**
     * @var string
     *
     * @ORM\Column(name="activity_code", type="string", length=255, nullable=true)
     */
    private $activityCode;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="affected_tables", type="string", length=255, nullable=true)
     */
    private $affectedTables;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_time", type="datetime", nullable=true)
     */
    private $dateTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="activity_log_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $activityLogId;

    /**
     * @var \PartyTribe\DirectoryBundle\Entity\BackofficeUser
     *
     * @ORM\ManyToOne(targetEntity="PartyTribe\DirectoryBundle\Entity\BackofficeUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="backoffice_user_id", referencedColumnName="backoffice_user_id")
     * })
     */
    private $backofficeUser;



    /**
     * Set activityCode
     *
     * @param string $activityCode
     * @return ActivityLog
     */
    public function setActivityCode($activityCode)
    {
        $this->activityCode = $activityCode;

        return $this;
    }

    /**
     * Get activityCode
     *
     * @return string 
     */
    public function getActivityCode()
    {
        return $this->activityCode;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return ActivityLog
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
     * Set affectedTables
     *
     * @param string $affectedTables
     * @return ActivityLog
     */
    public function setAffectedTables($affectedTables)
    {
        $this->affectedTables = $affectedTables;

        return $this;
    }

    /**
     * Get affectedTables
     *
     * @return string 
     */
    public function getAffectedTables()
    {
        return $this->affectedTables;
    }

    /**
     * Set dateTime
     *
     * @param \DateTime $dateTime
     * @return ActivityLog
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get dateTime
     *
     * @return \DateTime 
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Get activityLogId
     *
     * @return integer 
     */
    public function getActivityLogId()
    {
        return $this->activityLogId;
    }

    /**
     * Set backofficeUser
     *
     * @param \PartyTribe\DirectoryBundle\Entity\BackofficeUser $backofficeUser
     * @return ActivityLog
     */
    public function setBackofficeUser(\PartyTribe\DirectoryBundle\Entity\BackofficeUser $backofficeUser = null)
    {
        $this->backofficeUser = $backofficeUser;

        return $this;
    }

    /**
     * Get backofficeUser
     *
     * @return \PartyTribe\DirectoryBundle\Entity\BackofficeUser 
     */
    public function getBackofficeUser()
    {
        return $this->backofficeUser;
    }
}
