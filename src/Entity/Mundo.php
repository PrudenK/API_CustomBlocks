<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups ("mundo")
     */
    private $idmundo;

    /**
     * @var Jugador
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Jugador", inversedBy="mundos")
     * @ORM\JoinColumn(name="idJugador", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * @Groups ("mundo_jugador")
     */
    private $jugador;

    /**
     * @var bool
     *
     * @ORM\Column(name="completado", type="boolean", nullable=false)
     * @Groups ("mundo")
     */
    private $completado;

    /**
     * @var bool
     *
     * @ORM\Column(name="desbloqueado", type="boolean", nullable=false)
     * @Groups ("mundo")
     */
    private $desbloqueado;

    public function getIdmundo(): int
    {
        return $this->idmundo;
    }

    public function setIdmundo(int $idmundo): void
    {
        $this->idmundo = $idmundo;
    }

    public function getJugador(): Jugador
    {
        return $this->jugador;
    }

    public function setJugador(Jugador $jugador): void
    {
        $this->jugador = $jugador;
    }

    public function isCompletado(): bool
    {
        return $this->completado;
    }

    public function setCompletado(bool $completado): void
    {
        $this->completado = $completado;
    }

    public function isDesbloqueado(): bool
    {
        return $this->desbloqueado;
    }

    public function setDesbloqueado(bool $desbloqueado): void
    {
        $this->desbloqueado = $desbloqueado;
    }


}
