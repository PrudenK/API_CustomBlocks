<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ModosJuego
 *
 * @ORM\Table(name="modos_juego", indexes={@ORM\Index(name="IDX_CEF9902542C404EA", columns={"idJugador"})})
 * @ORM\Entity
 */
class ModosJuego
{
    /**
     * @var int
     *
     * @ORM\Column(name="idNumModo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idnummodo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="arrayPiezas", type="string", length=255, nullable=true)
     */
    private $arraypiezas;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tablero", type="string", length=20, nullable=true)
     */
    private $tablero;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tipoPieza", type="integer", nullable=true)
     */
    private $tipopieza;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tipoTableroSecun", type="integer", nullable=true)
     */
    private $tipotablerosecun;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tipoTableroPrincipal", type="integer", nullable=true)
     */
    private $tipotableroprincipal;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tiempoCaidaInicial", type="integer", nullable=true)
     */
    private $tiempocaidainicial;

    /**
     * @var int|null
     *
     * @ORM\Column(name="lineasParaSaltoNivel", type="integer", nullable=true)
     */
    private $lineasparasaltonivel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="saltoDeTiempoPorNivel", type="integer", nullable=true)
     */
    private $saltodetiempopornivel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="limiteRotaciones", type="integer", nullable=true)
     */
    private $limiterotaciones;

    /**
     * @var int|null
     *
     * @ORM\Column(name="hold", type="integer", nullable=true)
     */
    private $hold;

    /**
     * @var int|null
     *
     * @ORM\Column(name="piezas", type="integer", nullable=true)
     */
    private $piezas;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dashes", type="integer", nullable=true)
     */
    private $dashes;

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
