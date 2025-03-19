<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Mundo
 *
 * @ORM\Table(name="mundo", indexes={@ORM\Index(name="idJugador", columns={"idJugador"})})
 * @ORM\Entity
 */
class Mundo
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMundo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idmundo;

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
