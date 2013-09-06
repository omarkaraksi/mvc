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


}
