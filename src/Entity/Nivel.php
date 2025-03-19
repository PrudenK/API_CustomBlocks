<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Nivel
 *
 * @ORM\Table(name="nivel", indexes={@ORM\Index(name="idMundo", columns={"idMundo"}), @ORM\Index(name="idJugador", columns={"idJugador"})})
 * @ORM\Entity
 */
class Nivel
{
    /**
     * @var int
     *
     * @ORM\Column(name="idNivel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idnivel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tiempoObj", type="string", length=8, nullable=true)
     */
    private $tiempoobj;

    /**
     * @var int|null
     *
     * @ORM\Column(name="puntuacionObj", type="integer", nullable=true)
     */
    private $puntuacionobj;

    /**
     * @var int|null
     *
     * @ORM\Column(name="lineasObj", type="integer", nullable=true)
     */
    private $lineasobj;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mejorTiempo", type="string", length=10, nullable=true)
     */
    private $mejortiempo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="mejorPuntuacion", type="integer", nullable=true)
     */
    private $mejorpuntuacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="mejorLineas", type="integer", nullable=true)
     */
    private $mejorlineas;

    /**
     * @var bool
     *
     * @ORM\Column(name="completado", type="boolean", nullable=false)
     */
    private $completado;

    /**
     * @var bool
     *
     * @ORM\Column(name="desbloqueado", type="boolean", nullable=false)
     */
    private $desbloqueado;

    /**
     * @var \Mundo
     *
     * @ORM\ManyToOne(targetEntity="Mundo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMundo", referencedColumnName="idMundo")
     * })
     */
    private $idmundo;

    /**
     * @var \Jugador
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Jugador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idJugador", referencedColumnName="id")
     * })
     */
    private $idjugador;


}
