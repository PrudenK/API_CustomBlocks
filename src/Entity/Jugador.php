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

}
