<?php



use Doctrine\ORM\Mapping as ORM;

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
     */
    private $numo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numI", type="integer", nullable=true)
     */
    private $numi;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numL", type="integer", nullable=true)
     */
    private $numl;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numZ", type="integer", nullable=true)
     */
    private $numz;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numJ", type="integer", nullable=true)
     */
    private $numj;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numS", type="integer", nullable=true)
     */
    private $nums;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numT", type="integer", nullable=true)
     */
    private $numt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numP", type="integer", nullable=true)
     */
    private $nump;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numX", type="integer", nullable=true)
     */
    private $numx;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numU", type="integer", nullable=true)
     */
    private $numu;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numLv2", type="integer", nullable=true)
     */
    private $numlv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numW", type="integer", nullable=true)
     */
    private $numw;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numTv2", type="integer", nullable=true)
     */
    private $numtv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numZv2", type="integer", nullable=true)
     */
    private $numzv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numXv2", type="integer", nullable=true)
     */
    private $numxv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numLv3", type="integer", nullable=true)
     */
    private $numlv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numF", type="integer", nullable=true)
     */
    private $numf;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numOv2", type="integer", nullable=true)
     */
    private $numov2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numSv2", type="integer", nullable=true)
     */
    private $numsv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numB", type="integer", nullable=true)
     */
    private $numb;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numY", type="integer", nullable=true)
     */
    private $numy;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numK", type="integer", nullable=true)
     */
    private $numk;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numIv2", type="integer", nullable=true)
     */
    private $numiv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numC", type="integer", nullable=true)
     */
    private $numc;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numOv3", type="integer", nullable=true)
     */
    private $numov3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numV", type="integer", nullable=true)
     */
    private $numv;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numH", type="integer", nullable=true)
     */
    private $numh;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numIv3", type="integer", nullable=true)
     */
    private $numiv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numYv2", type="integer", nullable=true)
     */
    private $numyv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numOv4", type="integer", nullable=true)
     */
    private $numov4;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numJv2", type="integer", nullable=true)
     */
    private $numjv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numA", type="integer", nullable=true)
     */
    private $numa;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numMiniI", type="integer", nullable=true)
     */
    private $numminii;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numMiniIv2", type="integer", nullable=true)
     */
    private $numminiiv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numMiniL", type="integer", nullable=true)
     */
    private $numminil;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numMiniO", type="integer", nullable=true)
     */
    private $numminio;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numOv5", type="integer", nullable=true)
     */
    private $numov5;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numOv6", type="integer", nullable=true)
     */
    private $numov6;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numXv3", type="integer", nullable=true)
     */
    private $numxv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numE", type="integer", nullable=true)
     */
    private $nume;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numTwinO", type="integer", nullable=true)
     */
    private $numtwino;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numTwinY", type="integer", nullable=true)
     */
    private $numtwiny;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numPickAxe", type="integer", nullable=true)
     */
    private $numpickaxe;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numSv3", type="integer", nullable=true)
     */
    private $numsv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numTwinOv2", type="integer", nullable=true)
     */
    private $numtwinov2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numZv3", type="integer", nullable=true)
     */
    private $numzv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numLadder", type="integer", nullable=true)
     */
    private $numladder;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numHv2", type="integer", nullable=true)
     */
    private $numhv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="total", type="integer", nullable=true)
     */
    private $total;

    /**
     * @var \Jugador
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Jugador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idJugador", referencedColumnName="id")
     * })
     */
    private $idjugador;


}
