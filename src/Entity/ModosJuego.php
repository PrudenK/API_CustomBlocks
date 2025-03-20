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


}
