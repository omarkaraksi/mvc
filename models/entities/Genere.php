<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Genere
 *
 * @ORM\Table(name="Genere")
 * @ORM\Entity
 */
class Genere
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="genere_title", type="string", length=255, nullable=true)
     */
    private $genereTitle;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set genereTitle
     *
     * @param string $genereTitle
     * @return Genere
     */
    public function setGenereTitle($genereTitle)
    {
        $this->genereTitle = $genereTitle;
    
        return $this;
    }

    /**
     * Get genereTitle
     *
     * @return string 
     */
    public function getGenereTitle()
    {
        return $this->genereTitle;
    }
}