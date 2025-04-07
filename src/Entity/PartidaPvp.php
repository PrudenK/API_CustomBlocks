<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Jugador;

/**
 * PartidaPvp
 *
 * @ORM\Table(name="partida_pvp")
 * @ORM\Entity
 */
class PartidaPvp
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("partida_pvp")
     */
    private $id;

    /**
     * @var Jugador
     *
     * @ORM\ManyToOne(targetEntity="Jugador")
     * @ORM\JoinColumn(name="host", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @Groups("partida_pvp")
     */
    private $host;

    /**
     * @var Jugador
     *
     * @ORM\ManyToOne(targetEntity="Jugador")
     * @ORM\JoinColumn(name="visitante", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @Groups("partida_pvp")
     */
    private $visitante;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modo", type="string", length=50, nullable=true)
     * @Groups("partida_pvp")
     */
    private $modo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resultado", type="string", length=50, nullable=true)
     * @Groups("partida_pvp")
     */
    private $resultado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     * @Groups("partida_pvp")
     */
    private $fecha;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getHost(): \App\Entity\Jugador
    {
        return $this->host;
    }

    public function setHost(\App\Entity\Jugador $host): void
    {
        $this->host = $host;
    }

    public function getVisitante(): \App\Entity\Jugador
    {
        return $this->visitante;
    }

    public function setVisitante(\App\Entity\Jugador $visitante): void
    {
        $this->visitante = $visitante;
    }

    public function getModo(): ?string
    {
        return $this->modo;
    }

    public function setModo(?string $modo): void
    {
        $this->modo = $modo;
    }

    public function getResultado(): ?string
    {
        return $this->resultado;
    }

    public function setResultado(?string $resultado): void
    {
        $this->resultado = $resultado;
    }

    public function getFecha(): \DateTime
    {
        return $this->fecha;
    }

    public function setFecha(\DateTime $fecha): void
    {
        $this->fecha = $fecha;
    }
}