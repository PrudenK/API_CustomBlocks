<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ORM\Table(name="mundo_jugador")
 */
class MundoJugador
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Mundo")
     * @ORM\JoinColumn(name="idMundo", referencedColumnName="idMundo", nullable=false, onDelete="CASCADE")
     * @Groups("mundo_jugador")
     */
    private $mundo;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Jugador", inversedBy="mundosJugador")
     * @ORM\JoinColumn(name="idJugador", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * @Groups("mundo_jugador")
     */
    private $jugador;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("mundo_jugador")
     */
    private $completado;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("mundo_jugador")
     */
    private $desbloqueado;

    // Getters y setters

    public function getMundo(): ?Mundo
    {
        return $this->mundo;
    }

    public function setMundo(?Mundo $mundo): void
    {
        $this->mundo = $mundo;
    }

    public function getJugador(): ?Jugador
    {
        return $this->jugador;
    }

    public function setJugador(?Jugador $jugador): void
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
