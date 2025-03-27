<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * MensajeClan
 *
 * @ORM\Table(name="mensaje_clan", indexes={@ORM\Index(name="idClan", columns={"idClan"})})
 * @ORM\Entity
 */
class MensajeClan
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMensaje", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("mensaje_clan")
     */
    private $idmensaje;

    /**
     * @var Clan
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Clan")
     * @ORM\JoinColumn(name="idClan", referencedColumnName="idClan", nullable=false, onDelete="CASCADE")
     * @Groups("mensaje_clan_clan")
     */
    private $clan;

    /**
     * @var string
     *
     * @ORM\Column(name="remitente", type="string", length=100, nullable=false)
     * @Groups("mensaje_clan")
     */
    private $remitente;

    /**
     * @var string
     *
     * @ORM\Column(name="mensaje", type="text", nullable=false)
     * @Groups("mensaje_clan")
     */
    private $mensaje;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     * @Groups("mensaje_clan")
     */
    private $fecha;

    public function getIdmensaje(): int
    {
        return $this->idmensaje;
    }

    public function getClan(): Clan
    {
        return $this->clan;
    }

    public function setClan(Clan $clan): void
    {
        $this->clan = $clan;
    }

    public function getRemitente(): string
    {
        return $this->remitente;
    }

    public function setRemitente(string $remitente): void
    {
        $this->remitente = $remitente;
    }

    public function getMensaje(): string
    {
        return $this->mensaje;
    }

    public function setMensaje(string $mensaje): void
    {
        $this->mensaje = $mensaje;
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
