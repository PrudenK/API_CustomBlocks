<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Partida
 *
 * @ORM\Table(name="partida", indexes={@ORM\Index(name="idJugador", columns={"idJugador"})})
 * @ORM\Entity
 */
class Partida
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPartida", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups ("partida")
     */
    private $idpartida;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modo", type="string", length=100, nullable=true)
     * @Groups ("partida")
     */
    private $modo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nivel", type="integer", nullable=true)
     * @Groups ("partida")
     */
    private $nivel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="puntuacion", type="integer", nullable=true)
     * @Groups ("partida")
     */
    private $puntuacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tiempo", type="string", length=50, nullable=true)
     * @Groups ("partida")
     */
    private $tiempo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="lineas", type="integer", nullable=true)
     * @Groups ("partida")
     */
    private $lineas;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaJuego", type="datetime", nullable=true)
     * @Groups ("partida")
     */
    private $fechajuego;

    /**
     * @var Jugador
     *
     * @ORM\ManyToOne(targetEntity="Jugador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idJugador", referencedColumnName="id")
     * })
     * @Groups ("partida_jugador")
     */
    private $jugador;


}
