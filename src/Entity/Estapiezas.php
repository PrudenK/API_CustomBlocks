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

    public function getNumo(): ?int
    {
        return $this->numo;
    }

    public function setNumo(?int $numo): void
    {
        $this->numo = $numo;
    }

    public function getNumi(): ?int
    {
        return $this->numi;
    }

    public function setNumi(?int $numi): void
    {
        $this->numi = $numi;
    }

    public function getNuml(): ?int
    {
        return $this->numl;
    }

    public function setNuml(?int $numl): void
    {
        $this->numl = $numl;
    }

    public function getNumz(): ?int
    {
        return $this->numz;
    }

    public function setNumz(?int $numz): void
    {
        $this->numz = $numz;
    }

    public function getNumj(): ?int
    {
        return $this->numj;
    }

    public function setNumj(?int $numj): void
    {
        $this->numj = $numj;
    }

    public function getNums(): ?int
    {
        return $this->nums;
    }

    public function setNums(?int $nums): void
    {
        $this->nums = $nums;
    }

    public function getNumt(): ?int
    {
        return $this->numt;
    }

    public function setNumt(?int $numt): void
    {
        $this->numt = $numt;
    }

    public function getNump(): ?int
    {
        return $this->nump;
    }

    public function setNump(?int $nump): void
    {
        $this->nump = $nump;
    }

    public function getNumx(): ?int
    {
        return $this->numx;
    }

    public function setNumx(?int $numx): void
    {
        $this->numx = $numx;
    }

    public function getNumu(): ?int
    {
        return $this->numu;
    }

    public function setNumu(?int $numu): void
    {
        $this->numu = $numu;
    }

    public function getNumlv2(): ?int
    {
        return $this->numlv2;
    }

    public function setNumlv2(?int $numlv2): void
    {
        $this->numlv2 = $numlv2;
    }

    public function getNumw(): ?int
    {
        return $this->numw;
    }

    public function setNumw(?int $numw): void
    {
        $this->numw = $numw;
    }

    public function getNumtv2(): ?int
    {
        return $this->numtv2;
    }

    public function setNumtv2(?int $numtv2): void
    {
        $this->numtv2 = $numtv2;
    }

    public function getNumzv2(): ?int
    {
        return $this->numzv2;
    }

    public function setNumzv2(?int $numzv2): void
    {
        $this->numzv2 = $numzv2;
    }

    public function getNumxv2(): ?int
    {
        return $this->numxv2;
    }

    public function setNumxv2(?int $numxv2): void
    {
        $this->numxv2 = $numxv2;
    }

    public function getNumlv3(): ?int
    {
        return $this->numlv3;
    }

    public function setNumlv3(?int $numlv3): void
    {
        $this->numlv3 = $numlv3;
    }

    public function getNumf(): ?int
    {
        return $this->numf;
    }

    public function setNumf(?int $numf): void
    {
        $this->numf = $numf;
    }

    public function getNumov2(): ?int
    {
        return $this->numov2;
    }

    public function setNumov2(?int $numov2): void
    {
        $this->numov2 = $numov2;
    }

    public function getNumsv2(): ?int
    {
        return $this->numsv2;
    }

    public function setNumsv2(?int $numsv2): void
    {
        $this->numsv2 = $numsv2;
    }

    public function getNumb(): ?int
    {
        return $this->numb;
    }

    public function setNumb(?int $numb): void
    {
        $this->numb = $numb;
    }

    public function getNumy(): ?int
    {
        return $this->numy;
    }

    public function setNumy(?int $numy): void
    {
        $this->numy = $numy;
    }

    public function getNumk(): ?int
    {
        return $this->numk;
    }

    public function setNumk(?int $numk): void
    {
        $this->numk = $numk;
    }

    public function getNumiv2(): ?int
    {
        return $this->numiv2;
    }

    public function setNumiv2(?int $numiv2): void
    {
        $this->numiv2 = $numiv2;
    }

    public function getNumc(): ?int
    {
        return $this->numc;
    }

    public function setNumc(?int $numc): void
    {
        $this->numc = $numc;
    }

    public function getNumov3(): ?int
    {
        return $this->numov3;
    }

    public function setNumov3(?int $numov3): void
    {
        $this->numov3 = $numov3;
    }

    public function getNumv(): ?int
    {
        return $this->numv;
    }

    public function setNumv(?int $numv): void
    {
        $this->numv = $numv;
    }

    public function getNumh(): ?int
    {
        return $this->numh;
    }

    public function setNumh(?int $numh): void
    {
        $this->numh = $numh;
    }

    public function getNumiv3(): ?int
    {
        return $this->numiv3;
    }

    public function setNumiv3(?int $numiv3): void
    {
        $this->numiv3 = $numiv3;
    }

    public function getNumyv2(): ?int
    {
        return $this->numyv2;
    }

    public function setNumyv2(?int $numyv2): void
    {
        $this->numyv2 = $numyv2;
    }

    public function getNumov4(): ?int
    {
        return $this->numov4;
    }

    public function setNumov4(?int $numov4): void
    {
        $this->numov4 = $numov4;
    }

    public function getNumjv2(): ?int
    {
        return $this->numjv2;
    }

    public function setNumjv2(?int $numjv2): void
    {
        $this->numjv2 = $numjv2;
    }

    public function getNuma(): ?int
    {
        return $this->numa;
    }

    public function setNuma(?int $numa): void
    {
        $this->numa = $numa;
    }

    public function getNumminii(): ?int
    {
        return $this->numminii;
    }

    public function setNumminii(?int $numminii): void
    {
        $this->numminii = $numminii;
    }

    public function getNumminiiv2(): ?int
    {
        return $this->numminiiv2;
    }

    public function setNumminiiv2(?int $numminiiv2): void
    {
        $this->numminiiv2 = $numminiiv2;
    }

    public function getNumminil(): ?int
    {
        return $this->numminil;
    }

    public function setNumminil(?int $numminil): void
    {
        $this->numminil = $numminil;
    }

    public function getNumminio(): ?int
    {
        return $this->numminio;
    }

    public function setNumminio(?int $numminio): void
    {
        $this->numminio = $numminio;
    }

    public function getNumov5(): ?int
    {
        return $this->numov5;
    }

    public function setNumov5(?int $numov5): void
    {
        $this->numov5 = $numov5;
    }

    public function getNumov6(): ?int
    {
        return $this->numov6;
    }

    public function setNumov6(?int $numov6): void
    {
        $this->numov6 = $numov6;
    }

    public function getNumxv3(): ?int
    {
        return $this->numxv3;
    }

    public function setNumxv3(?int $numxv3): void
    {
        $this->numxv3 = $numxv3;
    }

    public function getNume(): ?int
    {
        return $this->nume;
    }

    public function setNume(?int $nume): void
    {
        $this->nume = $nume;
    }

    public function getNumtwino(): ?int
    {
        return $this->numtwino;
    }

    public function setNumtwino(?int $numtwino): void
    {
        $this->numtwino = $numtwino;
    }

    public function getNumtwiny(): ?int
    {
        return $this->numtwiny;
    }

    public function setNumtwiny(?int $numtwiny): void
    {
        $this->numtwiny = $numtwiny;
    }

    public function getNumpickaxe(): ?int
    {
        return $this->numpickaxe;
    }

    public function setNumpickaxe(?int $numpickaxe): void
    {
        $this->numpickaxe = $numpickaxe;
    }

    public function getNumsv3(): ?int
    {
        return $this->numsv3;
    }

    public function setNumsv3(?int $numsv3): void
    {
        $this->numsv3 = $numsv3;
    }

    public function getNumtwinov2(): ?int
    {
        return $this->numtwinov2;
    }

    public function setNumtwinov2(?int $numtwinov2): void
    {
        $this->numtwinov2 = $numtwinov2;
    }

    public function getNumzv3(): ?int
    {
        return $this->numzv3;
    }

    public function setNumzv3(?int $numzv3): void
    {
        $this->numzv3 = $numzv3;
    }

    public function getNumladder(): ?int
    {
        return $this->numladder;
    }

    public function setNumladder(?int $numladder): void
    {
        $this->numladder = $numladder;
    }

    public function getNumhv2(): ?int
    {
        return $this->numhv2;
    }

    public function setNumhv2(?int $numhv2): void
    {
        $this->numhv2 = $numhv2;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(?int $total): void
    {
        $this->total = $total;
    }

    public function getIdjugador(): Jugador
    {
        return $this->idjugador;
    }

    public function setIdjugador(Jugador $idjugador): void
    {
        $this->idjugador = $idjugador;
    }


}
