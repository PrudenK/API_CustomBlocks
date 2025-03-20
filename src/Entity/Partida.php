<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups ("partida")
     */
    private $idpartida;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modo", type="string", length=100, nullable=true)
     * @Groups ("partida")
     */
    private $modo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nivel", type="integer", nullable=true)
     * @Groups ("partida")
     */
    private $nivel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="puntuacion", type="integer", nullable=true)
     * @Groups ("partida")
     */
    private $puntuacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tiempo", type="string", length=50, nullable=true)
     * @Groups ("partida")
     */
    private $tiempo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="lineas", type="integer", nullable=true)
     * @Groups ("partida")
     */
    private $lineas;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaJuego", type="datetime", nullable=true)
     * @Groups ("partida")
     */
    private $fechajuego;

    /**
     * @var Jugador
     *
     * @ORM\ManyToOne(targetEntity="Jugador", inversedBy="partidas")
     * @ORM\JoinColumn(name="idJugador", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * @Groups ("partida_jugador")
     */
    private $jugador;

    public function getIdpartida(): int
    {
        return $this->idpartida;
    }

    public function setIdpartida(int $idpartida): void
    {
        $this->idpartida = $idpartida;
    }

    public function getModo(): ?string
    {
        return $this->modo;
    }

    public function setModo(?string $modo): void
    {
        $this->modo = $modo;
    }

    public function getNivel(): ?int
    {
        return $this->nivel;
    }

    public function setNivel(?int $nivel): void
    {
        $this->nivel = $nivel;
    }

    public function getPuntuacion(): ?int
    {
        return $this->puntuacion;
    }

    public function setPuntuacion(?int $puntuacion): void
    {
        $this->puntuacion = $puntuacion;
    }

    public function getTiempo(): ?string
    {
        return $this->tiempo;
    }

    public function setTiempo(?string $tiempo): void
    {
        $this->tiempo = $tiempo;
    }

    public function getLineas(): ?int
    {
        return $this->lineas;
    }

    public function setLineas(?int $lineas): void
    {
        $this->lineas = $lineas;
    }

    public function getFechajuego(): ?\DateTime
    {
        return $this->fechajuego;
    }

    public function setFechajuego(?\DateTime $fechajuego): void
    {
        $this->fechajuego = $fechajuego;
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
