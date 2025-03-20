<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logros
 *
 * @ORM\Table(name="logros")
 * @ORM\Entity
 */
class Logros
{
    /**
     * @var int
     *
     * @ORM\Column(name="idLogro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups ("logros")
     */
    private $idlogro;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     * @Groups ("logros")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", length=65535, nullable=false)
     * @Groups ("logros")
     */
    private $descripcion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Jugador", mappedBy="logros")
     * @Groups ("logros_jugador")
     */
    private $jugadores = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jugadores = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
