<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Logros
 *
 * @ORM\Table(name="logros")
 * @ORM\Entity
 */
class Logros
{
    /**
     * @var int
     *
     * @ORM\Column(name="idLogro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlogro;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", length=65535, nullable=false)
     */
    private $descripcion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Jugador", mappedBy="idlogro")
     */
    private $idjugador = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idjugador = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
