<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups ("nivel")
     */
    private $idnivel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tiempoObj", type="string", length=8, nullable=true)
     * @Groups ("nivel")
     */
    private $tiempoobj;

    /**
     * @var int|null
     *
     * @ORM\Column(name="puntuacionObj", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $puntuacionobj;

    /**
     * @var int|null
     *
     * @ORM\Column(name="lineasObj", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $lineasobj;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mejorTiempo", type="string", length=10, nullable=true)
     * @Groups ("nivel")
     */
    private $mejortiempo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="mejorPuntuacion", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $mejorpuntuacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="mejorLineas", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $mejorlineas;

    /**
     * @var bool
     *
     * @ORM\Column(name="completado", type="boolean", nullable=false)
     * @Groups ("nivel")
     */
    private $completado;

    /**
     * @var bool
     *
     * @ORM\Column(name="desbloqueado", type="boolean", nullable=false)
     * @Groups ("nivel")
     */
    private $desbloqueado;

    /**
     * @var Mundo
     *
     * @ORM\ManyToOne(targetEntity="Mundo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMundo", referencedColumnName="idMundo", nullable=false, onDelete="CASCADE"),
     *   @ORM\JoinColumn(name="idJugador", referencedColumnName="idJugador", nullable=false, onDelete="CASCADE")
     * })
     * @Groups ("nivel_mundo")
     */
    private $mundo;


    /**
     * @var Jugador
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Jugador", inversedBy="niveles")
     * @ORM\JoinColumn(name="idJugador", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * @Groups ("nivel_jugador")
     */
    private $jugador;

    public function getIdnivel(): int
    {
        return $this->idnivel;
    }

    public function setIdnivel(int $idnivel): void
    {
        $this->idnivel = $idnivel;
    }

    public function getTiempoobj(): ?string
    {
        return $this->tiempoobj;
    }

    public function setTiempoobj(?string $tiempoobj): void
    {
        $this->tiempoobj = $tiempoobj;
    }

    public function getPuntuacionobj(): ?int
    {
        return $this->puntuacionobj;
    }

    public function setPuntuacionobj(?int $puntuacionobj): void
    {
        $this->puntuacionobj = $puntuacionobj;
    }

    public function getLineasobj(): ?int
    {
        return $this->lineasobj;
    }

    public function setLineasobj(?int $lineasobj): void
    {
        $this->lineasobj = $lineasobj;
    }

    public function getMejortiempo(): ?string
    {
        return $this->mejortiempo;
    }

    public function setMejortiempo(?string $mejortiempo): void
    {
        $this->mejortiempo = $mejortiempo;
    }

    public function getMejorpuntuacion(): ?int
    {
        return $this->mejorpuntuacion;
    }

    public function setMejorpuntuacion(?int $mejorpuntuacion): void
    {
        $this->mejorpuntuacion = $mejorpuntuacion;
    }

    public function getMejorlineas(): ?int
    {
        return $this->mejorlineas;
    }

    public function setMejorlineas(?int $mejorlineas): void
    {
        $this->mejorlineas = $mejorlineas;
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

    public function getMundo(): Mundo
    {
        return $this->mundo;
    }

    public function setMundo(Mundo $mundo): void
    {
        $this->mundo = $mundo;
    }

    public function getJugador(): Jugador
    {
        return $this->jugador;
    }

    public function setJugador(Jugador $jugador): void
    {
        $this->jugador = $jugador;
    }

}
