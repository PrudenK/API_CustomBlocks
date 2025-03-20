<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Logros
 *
 * @ORM\Table(name="logros")
 * @ORM\Entity
 */
class Logros
{
    /**
     * @var int
     *
     * @ORM\Column(name="idLogro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups ("logros")
     */
    private $idlogro;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     * @Groups ("logros")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", length=65535, nullable=false)
     * @Groups ("logros")
     */
    private $descripcion;

    /**
     * @ORM\ManyToMany(targetEntity="Jugador", mappedBy="logros")
     * @Groups ("logros_jugador")
     */
    private $jugadores;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jugadores = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdlogro(): int
    {
        return $this->idlogro;
    }

    public function setIdlogro(int $idlogro): void
    {
        $this->idlogro = $idlogro;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getJugadores(): \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
    {
        return $this->jugadores;
    }

    public function setJugadores(\Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection $jugadores): void
    {
        $this->jugadores = $jugadores;
    }

}
