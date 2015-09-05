<?php

namespace PartyTribe\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artist
 *
 * @ORM\Table(name="artist")
 * @ORM\Entity
 */
class Artist
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="artist_type_tags", type="string", length=255, nullable=true)
     */
    private $artistTypeTags;

    /**
     * @var string
     *
     * @ORM\Column(name="genre_tags", type="string", length=255, nullable=true)
     */
    private $genreTags;

    /**
     * @var integer
     *
     * @ORM\Column(name="artist_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $artistId;



    /**
     * Set name
     *
     * @param string $name
     * @return Artist
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
     * Set description
     *
     * @param string $description
     * @return Artist
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
     * Set artistTypeTags
     *
     * @param string $artistTypeTags
     * @return Artist
     */
    public function setArtistTypeTags($artistTypeTags)
    {
        $this->artistTypeTags = $artistTypeTags;

        return $this;
    }

    /**
     * Get artistTypeTags
     *
     * @return string 
     */
    public function getArtistTypeTags()
    {
        return $this->artistTypeTags;
    }

    /**
     * Set genreTags
     *
     * @param string $genreTags
     * @return Artist
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
     * Get artistId
     *
     * @return integer 
     */
    public function getArtistId()
    {
        return $this->artistId;
    }
}
