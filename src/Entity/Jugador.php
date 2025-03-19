<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Jugador
 *
 * @ORM\Table(name="jugador")
 * @ORM\Entity
 */
class Jugador
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contrasena", type="string", length=255, nullable=true)
     */
    private $contrasena;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nivel", type="integer", nullable=true)
     */
    private $nivel;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaini", type="date", nullable=true)
     */
    private $fechaini;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pais", type="string", length=100, nullable=true)
     */
    private $pais;

    /**
     * @var int|null
     *
     * @ORM\Column(name="experiencia", type="integer", nullable=true)
     */
    private $experiencia;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Clan", inversedBy="idjugador")
     * @ORM\JoinTable(name="jugador_clan",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idJugador", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idClan", referencedColumnName="idClan")
     *   }
     * )
     */
    private $idclan = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Logros", inversedBy="idjugador")
     * @ORM\JoinTable(name="logro_jugador",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idJugador", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idLogro", referencedColumnName="idLogro")
     *   }
     * )
     */
    private $idlogro = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idclan = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idlogro = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
