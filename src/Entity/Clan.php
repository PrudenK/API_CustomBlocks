<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Clan
 *
 * @ORM\Table(name="clan", indexes={@ORM\Index(name="idLider", columns={"idLider"})})
 * @ORM\Entity
 */
class Clan
{
    /**
     * @var int
     *
     * @ORM\Column(name="idClan", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclan;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaini", type="date", nullable=true)
     */
    private $fechaini;

    /**
     * @var \Jugador
     *
     * @ORM\ManyToOne(targetEntity="Jugador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idLider", referencedColumnName="id")
     * })
     */
    private $idlider;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Jugador", mappedBy="idclan")
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
