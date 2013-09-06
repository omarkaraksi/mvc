<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Track
 *
 * @ORM\Table(name="track")
 * @ORM\Entity
 */
class Track
{
    /**
     * @var integer
     *
     * @ORM\Column(name="track_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $trackId;

    /**
     * @var integer
     *
     * @ORM\Column(name="track_title", type="integer", nullable=false)
     */
    private $trackTitle;

    /**
     * @var \Album
     *
     * @ORM\ManyToOne(targetEntity="Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="album_id", referencedColumnName="id")
     * })
     */
    private $album;



    /**
     * Get trackId
     *
     * @return integer 
     */
    public function getTrackId()
    {
        return $this->trackId;
    }

    /**
     * Set trackTitle
     *
     * @param integer $trackTitle
     * @return Track
     */
    public function setTrackTitle($trackTitle)
    {
        $this->trackTitle = $trackTitle;
    
        return $this;
    }

    /**
     * Get trackTitle
     *
     * @return integer 
     */
    public function getTrackTitle()
    {
        return $this->trackTitle;
    }

    /**
     * Set album
     *
     * @param \Album $album
     * @return Track
     */
    public function setAlbum(\Album $album = null)
    {
        $this->album = $album;
    
        return $this;
    }

    /**
     * Get album
     *
     * @return \Album 
     */
    public function getAlbum()
    {
        return $this->album;
    }
}