<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Estapiezas
 *
 * @ORM\Table(name="estaPiezas")
 * @ORM\Entity
 */
class Estapiezas
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="numO", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numI", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numi;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numL", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numl;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numZ", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numz;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numJ", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numj;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numS", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $nums;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numT", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numP", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $nump;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numX", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numx;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numU", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numu;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numLv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numlv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numW", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numw;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numTv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numtv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numZv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numzv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numXv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numxv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numLv3", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numlv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numF", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numf;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numOv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numov2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numSv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numsv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numB", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numb;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numY", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numy;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numK", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numk;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numIv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numiv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numC", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numc;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numOv3", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numov3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numV", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numv;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numH", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numh;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numIv3", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numiv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numYv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numyv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numOv4", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numov4;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numJv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numjv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numA", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numa;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numMiniI", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numminii;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numMiniIv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numminiiv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numMiniL", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numminil;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numMiniO", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numminio;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numOv5", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numov5;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numOv6", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numov6;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numXv3", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numxv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numE", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $nume;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numTwinO", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numtwino;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numTwinY", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numtwiny;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numPickAxe", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numpickaxe;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numSv3", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numsv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numTwinOv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numtwinov2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numZv3", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numzv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numLadder", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numladder;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numHv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numhv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="total", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $total;

    /**
     * @var Jugador
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Jugador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idJugador", referencedColumnName="id")
     * })
     * @Groups ("estaPiezas_jugador")
     */
    private $idjugador;


}
