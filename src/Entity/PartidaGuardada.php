<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * PartidaGuardada
 *
 * @ORM\Table(name="partida_guardada", indexes={@ORM\Index(name="idJugador", columns={"idJugador"})})
 * @ORM\Entity
 */
class PartidaGuardada
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"partidaGuardada"})
     */
    private $id;

    /**
     * @var Jugador
     *
     * @ORM\ManyToOne(targetEntity="Jugador")
     * @ORM\JoinColumn(name="idJugador", referencedColumnName="id", nullable=false)
     * @Groups({"partidaGuardada_jugador"})
     */
    private $idJugador;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $numPartidaGuardada;

    /**
     * @ORM\Column(type="string", length=20)
     * @Groups({"partidaGuardada"})
     */
    private $modo;

    /**
     * @ORM\Column(type="string", length=20)
     * @Groups({"partidaGuardada"})
     */
    private $tiempo;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $puntuacion;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $lineas;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $nivel;

    /**
     * @ORM\Column(type="json")
     * @Groups({"partidaGuardada"})
     */
    private $tableroPartida = [];

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $tamaTablero;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $diseTablero;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $diseTableroSecun;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $siguientesPiezasActivo;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"partidaGuardada"})
     */
    private $siguientesPiezas;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"partidaGuardada"})
     */
    private $arrayPiezas;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $disePiezas;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $holdActivo;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $dashActivo;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $velocidadCaidaActual;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $lineasParaSaltoDeNivel;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $saltoDeTiempoPorNivel;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $limiteRotaciones;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"partidaGuardada"})
     */
    private $piezaActual;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"partidaGuardada"})
     */
    private $posicionPiezaActual;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"partidaGuardada"})
     */
    private $numRotacionesDeLaPiezaActual;

    // Constructor
    public function __construct()
    {
    }

    // Getters y setters

    public function getId(): int
    {
        return $this->id;
    }

    public function getIdJugador(): Jugador
    {
        return $this->idJugador;
    }

    public function setIdJugador(Jugador $idJugador): void
    {
        $this->idJugador = $idJugador;
    }

    public function getNumPartidaGuardada(): int
    {
        return $this->numPartidaGuardada;
    }

    public function setNumPartidaGuardada(int $valor): void
    {
        $this->numPartidaGuardada = $valor;
    }

    public function getModo(): string
    {
        return $this->modo;
    }

    public function setModo(string $modo): void
    {
        $this->modo = $modo;
    }

    public function getTiempo(): string
    {
        return $this->tiempo;
    }

    public function setTiempo(string $tiempo): void
    {
        $this->tiempo = $tiempo;
    }

    public function getPuntuacion(): int
    {
        return $this->puntuacion;
    }

    public function setPuntuacion(int $valor): void
    {
        $this->puntuacion = $valor;
    }

    public function getLineas(): int
    {
        return $this->lineas;
    }

    public function setLineas(int $valor): void
    {
        $this->lineas = $valor;
    }

    public function getNivel(): int
    {
        return $this->nivel;
    }

    public function setNivel(int $valor): void
    {
        $this->nivel = $valor;
    }

    public function getTableroPartida(): array
    {
        return $this->tableroPartida;
    }

    public function setTableroPartida(array $tablero): void
    {
        $this->tableroPartida = $tablero;
    }

    public function getTamaTablero(): int
    {
        return $this->tamaTablero;
    }

    public function setTamaTablero(int $valor): void
    {
        $this->tamaTablero = $valor;
    }

    public function getDiseTablero(): int
    {
        return $this->diseTablero;
    }

    public function setDiseTablero(int $valor): void
    {
        $this->diseTablero = $valor;
    }

    public function getDiseTableroSecun(): int
    {
        return $this->diseTableroSecun;
    }

    public function setDiseTableroSecun(int $valor): void
    {
        $this->diseTableroSecun = $valor;
    }

    public function getSiguientesPiezasActivo(): int
    {
        return $this->siguientesPiezasActivo;
    }

    public function setSiguientesPiezasActivo(int $valor): void
    {
        $this->siguientesPiezasActivo = $valor;
    }

    public function getSiguientesPiezas(): string
    {
        return $this->siguientesPiezas;
    }

    public function setSiguientesPiezas(string $valor): void
    {
        $this->siguientesPiezas = $valor;
    }

    public function getArrayPiezas(): string
    {
        return $this->arrayPiezas;
    }

    public function setArrayPiezas(string $valor): void
    {
        $this->arrayPiezas = $valor;
    }

    public function getDisePiezas(): int
    {
        return $this->disePiezas;
    }

    public function setDisePiezas(int $valor): void
    {
        $this->disePiezas = $valor;
    }

    public function getHoldActivo(): int
    {
        return $this->holdActivo;
    }

    public function setHoldActivo(int $valor): void
    {
        $this->holdActivo = $valor;
    }

    public function getDashActivo(): int
    {
        return $this->dashActivo;
    }

    public function setDashActivo(int $valor): void
    {
        $this->dashActivo = $valor;
    }

    public function getVelocidadCaidaActual(): int
    {
        return $this->velocidadCaidaActual;
    }

    public function setVelocidadCaidaActual(int $valor): void
    {
        $this->velocidadCaidaActual = $valor;
    }

    public function getLineasParaSaltoDeNivel(): int
    {
        return $this->lineasParaSaltoDeNivel;
    }

    public function setLineasParaSaltoDeNivel(int $valor): void
    {
        $this->lineasParaSaltoDeNivel = $valor;
    }

    public function getSaltoDeTiempoPorNivel(): int
    {
        return $this->saltoDeTiempoPorNivel;
    }

    public function setSaltoDeTiempoPorNivel(int $valor): void
    {
        $this->saltoDeTiempoPorNivel = $valor;
    }

    public function getLimiteRotaciones(): int
    {
        return $this->limiteRotaciones;
    }

    public function setLimiteRotaciones(int $valor): void
    {
        $this->limiteRotaciones = $valor;
    }

    public function getPiezaActual(): string
    {
        return $this->piezaActual;
    }

    public function setPiezaActual(string $valor): void
    {
        $this->piezaActual = $valor;
    }

    public function getPosicionPiezaActual(): string
    {
        return $this->posicionPiezaActual;
    }

    public function setPosicionPiezaActual(string $valor): void
    {
        $this->posicionPiezaActual = $valor;
    }

    public function getNumRotacionesDeLaPiezaActual(): int
    {
        return $this->numRotacionesDeLaPiezaActual;
    }

    public function setNumRotacionesDeLaPiezaActual(int $valor): void
    {
        $this->numRotacionesDeLaPiezaActual = $valor;
    }
}
