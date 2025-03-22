<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Nivel
 *
 * @ORM\Table(name="nivel")
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
    private $idNivel;

    /**
     * @var Mundo
     *
     * @ORM\ManyToOne(targetEntity="Mundo")
     * @ORM\JoinColumn(name="idMundo", referencedColumnName="idMundo", nullable=false, onDelete="CASCADE")
     * @Groups ("nivel")
     */
    private $mundo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=30, nullable=true)
     * @Groups ("nivel")
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="arrayPiezas", type="string", length=255, nullable=true)
     * @Groups ("nivel")
     */
    private $arrayPiezas;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tiempoCaidaInicial", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $tiempoCaidaInicial;

    /**
     * @var int|null
     *
     * @ORM\Column(name="lienasParaAumentar", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $lienasParaAumentar;

    /**
     * @var int|null
     *
     * @ORM\Column(name="saltoDeTiempoPorLineas", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $saltoDeTiempoPorLineas;

    /**
     * @var bool
     *
     * @ORM\Column(name="limiteRotacionesB", type="boolean", nullable=false)
     * @Groups ("nivel")
     */
    private $limiteRotacionesB;

    /**
     * @var int|null
     *
     * @ORM\Column(name="limiteRotacionesNum", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $limiteRotacionesNum;

    /**
     * @var bool
     *
     * @ORM\Column(name="holdActivado", type="boolean", nullable=false)
     * @Groups ("nivel")
     */
    private $holdActivado;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tablero", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $tablero;

    /**
     * @var int|null
     *
     * @ORM\Column(name="siguientesDisponibles", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $siguientesDisponibles;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tipoTablero", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $tipoTablero;

    /**
     * @var bool
     *
     * @ORM\Column(name="dash", type="boolean", nullable=false)
     * @Groups ("nivel")
     */
    private $dash;

    /**
     * @var int|null
     *
     * @ORM\Column(name="puntuacionObj", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $puntuacionObj;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tiempoObj", type="string", length=9, nullable=true)
     * @Groups ("nivel")
     */
    private $tiempoObj;

    /**
     * @var int|null
     *
     * @ORM\Column(name="lineasObj", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $lineasObj;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numFases", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $numFases;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen", type="string", nullable=true)
     * @Groups ("nivel")
     */
    private $imagen;

    public function getIdNivel(): int
    {
        return $this->idNivel;
    }

    public function setIdNivel(int $idNivel): void
    {
        $this->idNivel = $idNivel;
    }

    public function getMundo(): Mundo
    {
        return $this->mundo;
    }

    public function setMundo(Mundo $mundo): void
    {
        $this->mundo = $mundo;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getArrayPiezas(): ?string
    {
        return $this->arrayPiezas;
    }

    public function setArrayPiezas(?string $arrayPiezas): void
    {
        $this->arrayPiezas = $arrayPiezas;
    }

    public function getTiempoCaidaInicial(): ?int
    {
        return $this->tiempoCaidaInicial;
    }

    public function setTiempoCaidaInicial(?int $tiempoCaidaInicial): void
    {
        $this->tiempoCaidaInicial = $tiempoCaidaInicial;
    }

    public function getLienasParaAumentar(): ?int
    {
        return $this->lienasParaAumentar;
    }

    public function setLienasParaAumentar(?int $lienasParaAumentar): void
    {
        $this->lienasParaAumentar = $lienasParaAumentar;
    }

    public function getSaltoDeTiempoPorLineas(): ?int
    {
        return $this->saltoDeTiempoPorLineas;
    }

    public function setSaltoDeTiempoPorLineas(?int $saltoDeTiempoPorLineas): void
    {
        $this->saltoDeTiempoPorLineas = $saltoDeTiempoPorLineas;
    }

    public function isLimiteRotacionesB(): bool
    {
        return $this->limiteRotacionesB;
    }

    public function setLimiteRotacionesB(bool $limiteRotacionesB): void
    {
        $this->limiteRotacionesB = $limiteRotacionesB;
    }

    public function getLimiteRotacionesNum(): ?int
    {
        return $this->limiteRotacionesNum;
    }

    public function setLimiteRotacionesNum(?int $limiteRotacionesNum): void
    {
        $this->limiteRotacionesNum = $limiteRotacionesNum;
    }

    public function isHoldActivado(): bool
    {
        return $this->holdActivado;
    }

    public function setHoldActivado(bool $holdActivado): void
    {
        $this->holdActivado = $holdActivado;
    }

    public function getTablero(): ?int
    {
        return $this->tablero;
    }

    public function setTablero(?int $tablero): void
    {
        $this->tablero = $tablero;
    }

    public function getSiguientesDisponibles(): ?int
    {
        return $this->siguientesDisponibles;
    }

    public function setSiguientesDisponibles(?int $siguientesDisponibles): void
    {
        $this->siguientesDisponibles = $siguientesDisponibles;
    }

    public function getTipoTablero(): ?int
    {
        return $this->tipoTablero;
    }

    public function setTipoTablero(?int $tipoTablero): void
    {
        $this->tipoTablero = $tipoTablero;
    }

    public function isDash(): bool
    {
        return $this->dash;
    }

    public function setDash(bool $dash): void
    {
        $this->dash = $dash;
    }

    public function getPuntuacionObj(): ?int
    {
        return $this->puntuacionObj;
    }

    public function setPuntuacionObj(?int $puntuacionObj): void
    {
        $this->puntuacionObj = $puntuacionObj;
    }

    public function getTiempoObj(): ?string
    {
        return $this->tiempoObj;
    }

    public function setTiempoObj(?string $tiempoObj): void
    {
        $this->tiempoObj = $tiempoObj;
    }

    public function getLineasObj(): ?int
    {
        return $this->lineasObj;
    }

    public function setLineasObj(?int $lineasObj): void
    {
        $this->lineasObj = $lineasObj;
    }

    public function getNumFases(): ?int
    {
        return $this->numFases;
    }

    public function setNumFases(?int $numFases): void
    {
        $this->numFases = $numFases;
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
