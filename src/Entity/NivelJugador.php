<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ORM\Table(name="nivel_jugador")
 */
class NivelJugador
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Nivel")
     * @ORM\JoinColumn(name="idNivel", referencedColumnName="idNivel", onDelete="CASCADE")
     * @Groups({"nivel_jugador"})
     */
    private $nivel;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Jugador", inversedBy="nivelesJugador")
     * @ORM\JoinColumn(name="idJugador", referencedColumnName="id", onDelete="CASCADE")
     * @Groups({"nivel_jugador"})
     */
    private $jugador;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     * @Groups({"nivel_jugador"})
     */
    private $mejorTiempo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"nivel_jugador"})
     */
    private $mejorPuntuacion;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"nivel_jugador"})
     */
    private $mejorLineas;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"nivel_jugador"})
     */
    private $completado;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"nivel_jugador"})
     */
    private $desbloqueado;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"nivel_jugador"})
     */
    private $numIntentos;

    // Getters y setters

    public function getNivel(): ?Nivel
    {
        return $this->nivel;
    }

    public function setNivel(?Nivel $nivel): void
    {
        $this->nivel = $nivel;
    }

    public function getJugador(): ?Jugador
    {
        return $this->jugador;
    }

    public function setJugador(?Jugador $jugador): void
    {
        $this->jugador = $jugador;
    }

    public function getMejorTiempo(): ?string
    {
        return $this->mejorTiempo;
    }

    public function setMejorTiempo(?string $mejorTiempo): void
    {
        $this->mejorTiempo = $mejorTiempo;
    }

    public function getMejorPuntuacion(): ?int
    {
        return $this->mejorPuntuacion;
    }

    public function setMejorPuntuacion(?int $mejorPuntuacion): void
    {
        $this->mejorPuntuacion = $mejorPuntuacion;
    }

    public function getMejorLineas(): ?int
    {
        return $this->mejorLineas;
    }

    public function setMejorLineas(?int $mejorLineas): void
    {
        $this->mejorLineas = $mejorLineas;
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

    public function getNumIntentos(): ?int
    {
        return $this->numIntentos;
    }

    public function setNumIntentos(?int $numIntentos): void
    {
        $this->numIntentos = $numIntentos;
    }
}
