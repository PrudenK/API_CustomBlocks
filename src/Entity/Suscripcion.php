<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Suscripcion
 *
 * @ORM\Table(name="suscripcion")
 * @ORM\Entity
 */
class Suscripcion
{
    /**
     * @var int
     *
     * @ORM\Column(name="tipo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups ("suscripcion")
     */
    private $tipo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     * @Groups ("suscripcion")
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="precio", type="string", length=20, nullable=true)
     * @Groups ("suscripcion")
     */
    private $precio;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numModos", type="integer", nullable=true)
     * @Groups ("suscripcion")
     */
    private $nummodos;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numPartidasGuardadas", type="integer", nullable=true)
     * @Groups ("suscripcion")
     */
    private $numPartidasGuardadas;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen", type="string", nullable=true)
     * @Groups ("suscripcion")
     */
    private $imagen;

    public function getTipo(): int
    {
        return $this->tipo;
    }

    public function setTipo(int $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(?string $precio): void
    {
        $this->precio = $precio;
    }

    public function getNummodos(): ?int
    {
        return $this->nummodos;
    }

    public function setNummodos(?int $nummodos): void
    {
        $this->nummodos = $nummodos;
    }

    public function getNumPartidasGuardadas(): ?int
    {
        return $this->numPartidasGuardadas;
    }

    public function setNumPartidasGuardadas(?int $numPartidasGuardadas): void
    {
        $this->numPartidasGuardadas = $numPartidasGuardadas;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): void
    {
        $this->imagen = $imagen;
    }
}
