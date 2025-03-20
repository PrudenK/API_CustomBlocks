<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * ModosJuego
 *
 * @ORM\Table(name="modos_juego", indexes={@ORM\Index(name="IDX_CEF9902542C404EA", columns={"idJugador"})})
 * @ORM\Entity
 */
class ModosJuego
{
    /**
     * @var int
     *
     * @ORM\Column(name="idNumModo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Groups ("modoJuego")
     */
    private $idnummodo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     * @Groups ("modoJuego")
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="arrayPiezas", type="string", length=255, nullable=true)
     * @Groups ("modoJuego")
     */
    private $arraypiezas;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tablero", type="string", length=20, nullable=true)
     * @Groups ("modoJuego")
     */
    private $tablero;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tipoPieza", type="integer", nullable=true)
     * @Groups ("modoJuego")
     */
    private $tipopieza;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tipoTableroSecun", type="integer", nullable=true)
     * @Groups ("modoJuego")
     */
    private $tipotablerosecun;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tipoTableroPrincipal", type="integer", nullable=true)
     * @Groups ("modoJuego")
     */
    private $tipotableroprincipal;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tiempoCaidaInicial", type="integer", nullable=true)
     * @Groups ("modoJuego")
     */
    private $tiempocaidainicial;

    /**
     * @var int|null
     *
     * @ORM\Column(name="lineasParaSaltoNivel", type="integer", nullable=true)
     * @Groups ("modoJuego")
     */
    private $lineasparasaltonivel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="saltoDeTiempoPorNivel", type="integer", nullable=true)
     * @Groups ("modoJuego")
     */
    private $saltodetiempopornivel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="limiteRotaciones", type="integer", nullable=true)
     * @Groups ("modoJuego")
     */
    private $limiterotaciones;

    /**
     * @var int|null
     *
     * @ORM\Column(name="hold", type="integer", nullable=true)
     * @Groups ("modoJuego")
     */
    private $hold;

    /**
     * @var int|null
     *
     * @ORM\Column(name="piezas", type="integer", nullable=true)
     * @Groups ("modoJuego")
     */
    private $piezas;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dashes", type="integer", nullable=true)
     * @Groups ("modoJuego")
     */
    private $dashes;

    /**
     * @var Jugador
     *
     * @ORM\ManyToOne(targetEntity="Jugador", inversedBy="modosJuego")
     * @ORM\JoinColumn(name="idJugador", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * @Groups ("modoJuego")
     */
    private $jugador;

    public function getIdnummodo(): int
    {
        return $this->idnummodo;
    }

    public function setIdnummodo(int $idnummodo): void
    {
        $this->idnummodo = $idnummodo;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getArraypiezas(): ?string
    {
        return $this->arraypiezas;
    }

    public function setArraypiezas(?string $arraypiezas): void
    {
        $this->arraypiezas = $arraypiezas;
    }

    public function getTablero(): ?string
    {
        return $this->tablero;
    }

    public function setTablero(?string $tablero): void
    {
        $this->tablero = $tablero;
    }

    public function getTipopieza(): ?int
    {
        return $this->tipopieza;
    }

    public function setTipopieza(?int $tipopieza): void
    {
        $this->tipopieza = $tipopieza;
    }

    public function getTipotablerosecun(): ?int
    {
        return $this->tipotablerosecun;
    }

    public function setTipotablerosecun(?int $tipotablerosecun): void
    {
        $this->tipotablerosecun = $tipotablerosecun;
    }

    public function getTipotableroprincipal(): ?int
    {
        return $this->tipotableroprincipal;
    }

    public function setTipotableroprincipal(?int $tipotableroprincipal): void
    {
        $this->tipotableroprincipal = $tipotableroprincipal;
    }

    public function getTiempocaidainicial(): ?int
    {
        return $this->tiempocaidainicial;
    }

    public function setTiempocaidainicial(?int $tiempocaidainicial): void
    {
        $this->tiempocaidainicial = $tiempocaidainicial;
    }

    public function getLineasparasaltonivel(): ?int
    {
        return $this->lineasparasaltonivel;
    }

    public function setLineasparasaltonivel(?int $lineasparasaltonivel): void
    {
        $this->lineasparasaltonivel = $lineasparasaltonivel;
    }

    public function getSaltodetiempopornivel(): ?int
    {
        return $this->saltodetiempopornivel;
    }

    public function setSaltodetiempopornivel(?int $saltodetiempopornivel): void
    {
        $this->saltodetiempopornivel = $saltodetiempopornivel;
    }

    public function getLimiterotaciones(): ?int
    {
        return $this->limiterotaciones;
    }

    public function setLimiterotaciones(?int $limiterotaciones): void
    {
        $this->limiterotaciones = $limiterotaciones;
    }

    public function getHold(): ?int
    {
        return $this->hold;
    }

    public function setHold(?int $hold): void
    {
        $this->hold = $hold;
    }

    public function getPiezas(): ?int
    {
        return $this->piezas;
    }

    public function setPiezas(?int $piezas): void
    {
        $this->piezas = $piezas;
    }

    public function getDashes(): ?int
    {
        return $this->dashes;
    }

    public function setDashes(?int $dashes): void
    {
        $this->dashes = $dashes;
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
