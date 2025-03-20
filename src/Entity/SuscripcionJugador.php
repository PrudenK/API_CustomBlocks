<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * SuscripcionJugador
 *
 * @ORM\Table(name="suscripcion_jugador", indexes={@ORM\Index(name="tipo", columns={"tipo"}), @ORM\Index(name="IDX_BE0F928F42C404EA", columns={"idJugador"})})
 * @ORM\Entity
 */
class SuscripcionJugador
{
    /**
     * @var string
     *
     * @ORM\Column(name="fechaFin", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Groups ("suscripcionJugador")
     */
    private $fechafin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fechaInicio", type="string", length=10, nullable=true)
     * @Groups ("suscripcionJugador")
     */
    private $fechainicio;

    /**
     * @var Jugador
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Jugador", inversedBy="suscripciones")
     * @ORM\JoinColumn(name="idJugador", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * @Groups ("suscripcionJugador_jugador")
     */
    private $jugador;

    /**
     * @var Suscripcion
     *
     * @ORM\ManyToOne(targetEntity="Suscripcion")
     * @ORM\JoinColumn(name="tipo", referencedColumnName="tipo", nullable=false, onDelete="CASCADE")
     * @Groups ("suscripcionJugador_tipo")
     */
    private $tipo;


}
