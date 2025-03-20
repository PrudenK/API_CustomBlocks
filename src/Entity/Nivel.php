<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Nivel
 *
 * @ORM\Table(name="nivel", indexes={@ORM\Index(name="idMundo", columns={"idMundo"}), @ORM\Index(name="idJugador", columns={"idJugador"})})
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
    private $idnivel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tiempoObj", type="string", length=8, nullable=true)
     * @Groups ("nivel")
     */
    private $tiempoobj;

    /**
     * @var int|null
     *
     * @ORM\Column(name="puntuacionObj", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $puntuacionobj;

    /**
     * @var int|null
     *
     * @ORM\Column(name="lineasObj", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $lineasobj;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mejorTiempo", type="string", length=10, nullable=true)
     * @Groups ("nivel")
     */
    private $mejortiempo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="mejorPuntuacion", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $mejorpuntuacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="mejorLineas", type="integer", nullable=true)
     * @Groups ("nivel")
     */
    private $mejorlineas;

    /**
     * @var bool
     *
     * @ORM\Column(name="completado", type="boolean", nullable=false)
     * @Groups ("nivel")
     */
    private $completado;

    /**
     * @var bool
     *
     * @ORM\Column(name="desbloqueado", type="boolean", nullable=false)
     * @Groups ("nivel")
     */
    private $desbloqueado;

    /**
     * @var Mundo
     *
     * @ORM\ManyToOne(targetEntity="Mundo")
     * @ORM\JoinColumn(name="idMundo", referencedColumnName="idMundo", nullable=false, onDelete="CASCADE")
     * @Groups ("nivel_mundo")
     */
    private $mundo;

    /**
     * @var Jugador
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Jugador")
     * @ORM\JoinColumn(name="idJugador", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * @Groups ("nivel_jugador")
     */
    private $jugador;

}
