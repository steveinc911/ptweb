<?php

namespace PartyTribe\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventArtist
 *
 * @ORM\Table(name="event_artist", indexes={@ORM\Index(name="fk_EventArtist_Event_1", columns={"event_id"}), @ORM\Index(name="fk_EventArtist_Artist_1", columns={"artist_id"})})
 * @ORM\Entity
 */
class EventArtist
{
    /**
     * @var integer
     *
     * @ORM\Column(name="event_artist_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eventArtistId;

    /**
     * @var \PartyTribe\DirectoryBundle\Entity\Event
     *
     * @ORM\ManyToOne(targetEntity="PartyTribe\DirectoryBundle\Entity\Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="event_id", referencedColumnName="event_id")
     * })
     */
    private $event;

    /**
     * @var \PartyTribe\DirectoryBundle\Entity\Artist
     *
     * @ORM\ManyToOne(targetEntity="PartyTribe\DirectoryBundle\Entity\Artist")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="artist_id", referencedColumnName="artist_id")
     * })
     */
    private $artist;



    /**
     * Get eventArtistId
     *
     * @return integer 
     */
    public function getEventArtistId()
    {
        return $this->eventArtistId;
    }

    /**
     * Set event
     *
     * @param \PartyTribe\DirectoryBundle\Entity\Event $event
     * @return EventArtist
     */
    public function setEvent(\PartyTribe\DirectoryBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \PartyTribe\DirectoryBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set artist
     *
     * @param \PartyTribe\DirectoryBundle\Entity\Artist $artist
     * @return EventArtist
     */
    public function setArtist(\PartyTribe\DirectoryBundle\Entity\Artist $artist = null)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return \PartyTribe\DirectoryBundle\Entity\Artist 
     */
    public function getArtist()
    {
        return $this->artist;
    }
}
