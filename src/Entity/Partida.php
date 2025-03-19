<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Partida
 *
 * @ORM\Table(name="partida", indexes={@ORM\Index(name="idJugador", columns={"idJugador"})})
 * @ORM\Entity
 */
class Partida
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPartida", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpartida;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modo", type="string", length=100, nullable=true)
     */
    private $modo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nivel", type="integer", nullable=true)
     */
    private $nivel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="puntuacion", type="integer", nullable=true)
     */
    private $puntuacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tiempo", type="string", length=50, nullable=true)
     */
    private $tiempo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="lineas", type="integer", nullable=true)
     */
    private $lineas;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaJuego", type="datetime", nullable=true)
     */
    private $fechajuego;

    /**
     * @var \Jugador
     *
     * @ORM\ManyToOne(targetEntity="Jugador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idJugador", referencedColumnName="id")
     * })
     */
    private $idjugador;


}
