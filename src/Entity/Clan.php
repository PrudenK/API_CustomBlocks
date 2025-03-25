<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Clan
 *
 * @ORM\Table(name="clan", indexes={@ORM\Index(name="idLider", columns={"idLider"})})
 * @ORM\Entity
 */
class Clan
{
    /**
     * @var int
     *
     * @ORM\Column(name="idClan", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups ("clan")
     */
    private $idclan;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     * @Groups ("clan")
     */
    private $nombre;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaini", type="date", nullable=true)
     * @Groups ("clan")
     */
    private $fechaini;

    /**
     * @var Jugador
     *
     * @ORM\ManyToOne(targetEntity="Jugador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idLider", referencedColumnName="id")
     * })
     * @Groups ("clan_lider")
     */
    private $idlider;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="Jugador", mappedBy="clan")
     * @Groups ("clan_jugadores")
     */
    private $jugadores;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=true)
     */
    private $imagen;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="string", length=75, nullable=true)
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ubicacion", type="string", length=100, nullable=true)
     */
    private $ubicacion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jugadores = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdclan(): int
    {
        return $this->idclan;
    }

    public function setIdclan(int $idclan): void
    {
        $this->idclan = $idclan;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getFechaini(): ?\DateTime
    {
        return $this->fechaini;
    }

    public function setFechaini(?\DateTime $fechaini): void
    {
        $this->fechaini = $fechaini;
    }

    public function getIdlider(): Jugador
    {
        return $this->idlider;
    }

    public function setIdlider(Jugador $idlider): void
    {
        $this->idlider = $idlider;
    }

    public function getJugadores(): \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
    {
        return $this->jugadores;
    }

    public function setJugadores(\Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection $jugadores): void
    {
        $this->jugadores = $jugadores;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): void
    {
        $this->imagen = $imagen;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getUbicacion(): ?string
    {
        return $this->ubicacion;
    }

    public function setUbicacion(?string $ubicacion): void
    {
        $this->ubicacion = $ubicacion;
    }

}
