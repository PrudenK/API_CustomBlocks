<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Jugador
 *
 * @ORM\Table(name="jugador")
 * @ORM\Entity
 */
class Jugador
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups ("jugador")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     * @Groups ("jugador")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="contrasena", type="string", length=255, nullable=false)
     * @Groups ("jugador_contra")
     */
    private $contrasena;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nivel", type="integer", nullable=true)
     * @Groups ("jugador")
     */
    private $nivel;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaini", type="date", nullable=true)
     * @Groups ("jugador")
     */
    private $fechaini;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pais", type="string", length=100, nullable=true)
     * @Groups ("jugador")
     */
    private $pais;

    /**
     * @var int|null
     *
     * @ORM\Column(name="experiencia", type="integer", nullable=true)
     * @Groups ("jugador")
     */
    private $experiencia;

    /**
     * @var Clan
     * @ORM\ManyToOne(targetEntity="Clan", inversedBy="jugadores")
     * @ORM\JoinColumn(name="idClan", referencedColumnName="idClan", nullable=true, onDelete="SET NULL")
     * @Groups ("jugador_clan")
     */
    private $clan;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Logros", inversedBy="jugadores")
     * @ORM\JoinTable(name="logro_jugador",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idJugador", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idLogro", referencedColumnName="idLogro")
     *   }
     * )
     * @Groups ("jugador_logros")
     */
    private $logros = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="ModosJuego", mappedBy="jugador", cascade={"persist", "remove"})
     * @Groups ("jugador_modos")
     */
    private $modosJuego;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="Mundo", mappedBy="jugador", cascade={"persist", "remove"})
     * @Groups ("jugador_mundos")
     */
    private $mundos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Nivel", mappedBy="jugador", cascade={"persist", "remove"})
     * @Groups ("jugador_niveles")
     */
    private $niveles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Partida", mappedBy="jugador", cascade={"persist", "remove"})
     * @Groups ("jugador_partidas")
     */
    private $partidas;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="SuscripcionJugador", mappedBy="jugador", cascade={"persist", "remove"})
     * @Groups ("jugador_suscripciones")
     */
    private $suscripciones;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->logros = new \Doctrine\Common\Collections\ArrayCollection();
        $this->modosJuego = new \Doctrine\Common\Collections\ArrayCollection();
        $this->mundos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->niveles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->partidas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->suscripciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getContrasena(): string
    {
        return $this->contrasena;
    }

    public function setContrasena(string $contrasena): void
    {
        $this->contrasena = $contrasena;
    }

    public function getNivel(): ?int
    {
        return $this->nivel;
    }

    public function setNivel(?int $nivel): void
    {
        $this->nivel = $nivel;
    }

    public function getFechaini(): ?\DateTime
    {
        return $this->fechaini;
    }

    public function setFechaini(?\DateTime $fechaini): void
    {
        $this->fechaini = $fechaini;
    }

    public function getPais(): ?string
    {
        return $this->pais;
    }

    public function setPais(?string $pais): void
    {
        $this->pais = $pais;
    }

    public function getExperiencia(): ?int
    {
        return $this->experiencia;
    }

    public function setExperiencia(?int $experiencia): void
    {
        $this->experiencia = $experiencia;
    }

    public function getClan()
    {
        return $this->clan;
    }

    public function setClan($clan): void
    {
        $this->clan = $clan;
    }

    public function getLogros(): \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
    {
        return $this->logros;
    }

    public function setLogros(\Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection $logros): void
    {
        $this->logros = $logros;
    }

    public function getModosJuego(): \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
    {
        return $this->modosJuego;
    }

    public function setModosJuego(\Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection $modosJuego): void
    {
        $this->modosJuego = $modosJuego;
    }

    public function getMundos(): \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
    {
        return $this->mundos;
    }

    public function setMundos(\Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection $mundos): void
    {
        $this->mundos = $mundos;
    }

    public function getNiveles(): \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
    {
        return $this->niveles;
    }

    public function setNiveles(\Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection $niveles): void
    {
        $this->niveles = $niveles;
    }

    public function getPartidas(): \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
    {
        return $this->partidas;
    }

    public function setPartidas(\Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection $partidas): void
    {
        $this->partidas = $partidas;
    }

    public function getSuscripciones(): \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
    {
        return $this->suscripciones;
    }

    public function setSuscripciones(\Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection $suscripciones): void
    {
        $this->suscripciones = $suscripciones;
    }

}
