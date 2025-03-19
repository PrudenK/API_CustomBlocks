<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * SuscripcionJugador
 *
 * @ORM\Table(name="suscripcion_jugador", indexes={@ORM\Index(name="tipo", columns={"tipo"}), @ORM\Index(name="IDX_BE0F928F42C404EA", columns={"idJugador"})})
 * @ORM\Entity
 */
class SuscripcionJugador
{
    /**
     * @var string
     *
     * @ORM\Column(name="fechaFin", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $fechafin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fechaInicio", type="string", length=10, nullable=true)
     */
    private $fechainicio;

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

    /**
     * @var \Suscripcion
     *
     * @ORM\ManyToOne(targetEntity="Suscripcion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo", referencedColumnName="tipo")
     * })
     */
    private $tipo;


}
