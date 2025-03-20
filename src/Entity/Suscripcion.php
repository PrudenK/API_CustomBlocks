<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Suscripcion
 *
 * @ORM\Table(name="suscripcion")
 * @ORM\Entity
 */
class Suscripcion
{
    /**
     * @var int
     *
     * @ORM\Column(name="tipo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups ("suscripcion")
     */
    private $tipo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     * @Groups ("suscripcion")
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="precio", type="string", length=20, nullable=true)
     * @Groups ("suscripcion")
     */
    private $precio;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numModos", type="integer", nullable=true)
     * @Groups ("suscripcion")
     */
    private $nummodos;


}
