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
    private $numO;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numI", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numI;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numL", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numZ", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numZ;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numJ", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numJ;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numS", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numS;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numT", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numT;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numP", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numP;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numX", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numX;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numU", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numU;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numLv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numLv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numW", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numW;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numTv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numTv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numZv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numZv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numXv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numXv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numLv3", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numLv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numF", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numF;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numOv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numOv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numSv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numSv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numB", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numB;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numY", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numY;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numK", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numK;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numIv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numIv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numC", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numC;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numOv3", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numOv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numV", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numV;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numH", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numH;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numIv3", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numIv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numYv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numYv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numOv4", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numOv4;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numJv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numJv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numA", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numA;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numMiniI", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numMiniI;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numMiniIv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numMiniIv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numMiniL", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numMiniL;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numMiniO", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numMiniO;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numOv5", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numOv5;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numOv6", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numOv6;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numXv3", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numXv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numE", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numE;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numTwinO", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numTwinO;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numTwinY", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numTwinY;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numPickAxe", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numPickAxe;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numSv3", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numSv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numTwinOv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numTwinOv2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numZv3", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numZv3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numLadder", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numLadder;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numHv2", type="integer", nullable=true)
     * @Groups ("estaPiezas")
     */
    private $numHv2;

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

    public function getNumO(): ?int
    {
        return $this->numO;
    }

    public function setNumO(?int $numO): void
    {
        $this->numO = $numO;
    }

    public function getNumI(): ?int
    {
        return $this->numI;
    }

    public function setNumI(?int $numI): void
    {
        $this->numI = $numI;
    }

    public function getNumL(): ?int
    {
        return $this->numL;
    }

    public function setNumL(?int $numL): void
    {
        $this->numL = $numL;
    }

    public function getNumZ(): ?int
    {
        return $this->numZ;
    }

    public function setNumZ(?int $numZ): void
    {
        $this->numZ = $numZ;
    }

    public function getNumJ(): ?int
    {
        return $this->numJ;
    }

    public function setNumJ(?int $numJ): void
    {
        $this->numJ = $numJ;
    }

    public function getNumS(): ?int
    {
        return $this->numS;
    }

    public function setNumS(?int $numS): void
    {
        $this->numS = $numS;
    }

    public function getNumT(): ?int
    {
        return $this->numT;
    }

    public function setNumT(?int $numT): void
    {
        $this->numT = $numT;
    }

    public function getNumP(): ?int
    {
        return $this->numP;
    }

    public function setNumP(?int $numP): void
    {
        $this->numP = $numP;
    }

    public function getNumX(): ?int
    {
        return $this->numX;
    }

    public function setNumX(?int $numX): void
    {
        $this->numX = $numX;
    }

    public function getNumU(): ?int
    {
        return $this->numU;
    }

    public function setNumU(?int $numU): void
    {
        $this->numU = $numU;
    }

    public function getNumLv2(): ?int
    {
        return $this->numLv2;
    }

    public function setNumLv2(?int $numLv2): void
    {
        $this->numLv2 = $numLv2;
    }

    public function getNumW(): ?int
    {
        return $this->numW;
    }

    public function setNumW(?int $numW): void
    {
        $this->numW = $numW;
    }

    public function getNumTv2(): ?int
    {
        return $this->numTv2;
    }

    public function setNumTv2(?int $numTv2): void
    {
        $this->numTv2 = $numTv2;
    }

    public function getNumZv2(): ?int
    {
        return $this->numZv2;
    }

    public function setNumZv2(?int $numZv2): void
    {
        $this->numZv2 = $numZv2;
    }

    public function getNumXv2(): ?int
    {
        return $this->numXv2;
    }

    public function setNumXv2(?int $numXv2): void
    {
        $this->numXv2 = $numXv2;
    }

    public function getNumLv3(): ?int
    {
        return $this->numLv3;
    }

    public function setNumLv3(?int $numLv3): void
    {
        $this->numLv3 = $numLv3;
    }

    public function getNumF(): ?int
    {
        return $this->numF;
    }

    public function setNumF(?int $numF): void
    {
        $this->numF = $numF;
    }

    public function getNumOv2(): ?int
    {
        return $this->numOv2;
    }

    public function setNumOv2(?int $numOv2): void
    {
        $this->numOv2 = $numOv2;
    }

    public function getNumSv2(): ?int
    {
        return $this->numSv2;
    }

    public function setNumSv2(?int $numSv2): void
    {
        $this->numSv2 = $numSv2;
    }

    public function getNumB(): ?int
    {
        return $this->numB;
    }

    public function setNumB(?int $numB): void
    {
        $this->numB = $numB;
    }

    public function getNumY(): ?int
    {
        return $this->numY;
    }

    public function setNumY(?int $numY): void
    {
        $this->numY = $numY;
    }

    public function getNumK(): ?int
    {
        return $this->numK;
    }

    public function setNumK(?int $numK): void
    {
        $this->numK = $numK;
    }

    public function getNumIv2(): ?int
    {
        return $this->numIv2;
    }

    public function setNumIv2(?int $numIv2): void
    {
        $this->numIv2 = $numIv2;
    }

    public function getNumC(): ?int
    {
        return $this->numC;
    }

    public function setNumC(?int $numC): void
    {
        $this->numC = $numC;
    }

    public function getNumOv3(): ?int
    {
        return $this->numOv3;
    }

    public function setNumOv3(?int $numOv3): void
    {
        $this->numOv3 = $numOv3;
    }

    public function getNumV(): ?int
    {
        return $this->numV;
    }

    public function setNumV(?int $numV): void
    {
        $this->numV = $numV;
    }

    public function getNumH(): ?int
    {
        return $this->numH;
    }

    public function setNumH(?int $numH): void
    {
        $this->numH = $numH;
    }

    public function getNumIv3(): ?int
    {
        return $this->numIv3;
    }

    public function setNumIv3(?int $numIv3): void
    {
        $this->numIv3 = $numIv3;
    }

    public function getNumYv2(): ?int
    {
        return $this->numYv2;
    }

    public function setNumYv2(?int $numYv2): void
    {
        $this->numYv2 = $numYv2;
    }

    public function getNumOv4(): ?int
    {
        return $this->numOv4;
    }

    public function setNumOv4(?int $numOv4): void
    {
        $this->numOv4 = $numOv4;
    }

    public function getNumJv2(): ?int
    {
        return $this->numJv2;
    }

    public function setNumJv2(?int $numJv2): void
    {
        $this->numJv2 = $numJv2;
    }

    public function getNumA(): ?int
    {
        return $this->numA;
    }

    public function setNumA(?int $numA): void
    {
        $this->numA = $numA;
    }

    public function getNumMiniI(): ?int
    {
        return $this->numMiniI;
    }

    public function setNumMiniI(?int $numMiniI): void
    {
        $this->numMiniI = $numMiniI;
    }

    public function getNumMiniIv2(): ?int
    {
        return $this->numMiniIv2;
    }

    public function setNumMiniIv2(?int $numMiniIv2): void
    {
        $this->numMiniIv2 = $numMiniIv2;
    }

    public function getNumMiniL(): ?int
    {
        return $this->numMiniL;
    }

    public function setNumMiniL(?int $numMiniL): void
    {
        $this->numMiniL = $numMiniL;
    }

    public function getNumMiniO(): ?int
    {
        return $this->numMiniO;
    }

    public function setNumMiniO(?int $numMiniO): void
    {
        $this->numMiniO = $numMiniO;
    }

    public function getNumOv5(): ?int
    {
        return $this->numOv5;
    }

    public function setNumOv5(?int $numOv5): void
    {
        $this->numOv5 = $numOv5;
    }

    public function getNumOv6(): ?int
    {
        return $this->numOv6;
    }

    public function setNumOv6(?int $numOv6): void
    {
        $this->numOv6 = $numOv6;
    }

    public function getNumXv3(): ?int
    {
        return $this->numXv3;
    }

    public function setNumXv3(?int $numXv3): void
    {
        $this->numXv3 = $numXv3;
    }

    public function getNumE(): ?int
    {
        return $this->numE;
    }

    public function setNumE(?int $numE): void
    {
        $this->numE = $numE;
    }

    public function getNumTwinO(): ?int
    {
        return $this->numTwinO;
    }

    public function setNumTwinO(?int $numTwinO): void
    {
        $this->numTwinO = $numTwinO;
    }

    public function getNumTwinY(): ?int
    {
        return $this->numTwinY;
    }

    public function setNumTwinY(?int $numTwinY): void
    {
        $this->numTwinY = $numTwinY;
    }

    public function getNumPickAxe(): ?int
    {
        return $this->numPickAxe;
    }

    public function setNumPickAxe(?int $numPickAxe): void
    {
        $this->numPickAxe = $numPickAxe;
    }

    public function getNumSv3(): ?int
    {
        return $this->numSv3;
    }

    public function setNumSv3(?int $numSv3): void
    {
        $this->numSv3 = $numSv3;
    }

    public function getNumTwinOv2(): ?int
    {
        return $this->numTwinOv2;
    }

    public function setNumTwinOv2(?int $numTwinOv2): void
    {
        $this->numTwinOv2 = $numTwinOv2;
    }

    public function getNumZv3(): ?int
    {
        return $this->numZv3;
    }

    public function setNumZv3(?int $numZv3): void
    {
        $this->numZv3 = $numZv3;
    }

    public function getNumLadder(): ?int
    {
        return $this->numLadder;
    }

    public function setNumLadder(?int $numLadder): void
    {
        $this->numLadder = $numLadder;
    }

    public function getNumHv2(): ?int
    {
        return $this->numHv2;
    }

    public function setNumHv2(?int $numHv2): void
    {
        $this->numHv2 = $numHv2;
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

    public function resetValores(): void
    {
        $this->numO = 0;
        $this->numI = 0;
        $this->numL = 0;
        $this->numZ = 0;
        $this->numJ = 0;
        $this->numS = 0;
        $this->numT = 0;
        $this->numP = 0;
        $this->numX = 0;
        $this->numU = 0;
        $this->numLv2 = 0;
        $this->numW = 0;
        $this->numTv2 = 0;
        $this->numZv2 = 0;
        $this->numXv2 = 0;
        $this->numLv3 = 0;
        $this->numF = 0;
        $this->numOv2 = 0;
        $this->numSv2 = 0;
        $this->numB = 0;
        $this->numY = 0;
        $this->numK = 0;
        $this->numIv2 = 0;
        $this->numC = 0;
        $this->numOv3 = 0;
        $this->numV = 0;
        $this->numH = 0;
        $this->numIv3 = 0;
        $this->numYv2 = 0;
        $this->numOv4 = 0;
        $this->numJv2 = 0;
        $this->numA = 0;
        $this->numMiniI = 0;
        $this->numMiniIv2 = 0;
        $this->numMiniL = 0;
        $this->numMiniO = 0;
        $this->numOv5 = 0;
        $this->numOv6 = 0;
        $this->numXv3 = 0;
        $this->numE = 0;
        $this->numTwinO = 0;
        $this->numTwinY = 0;
        $this->numPickAxe = 0;
        $this->numSv3 = 0;
        $this->numTwinOv2 = 0;
        $this->numZv3 = 0;
        $this->numLadder = 0;
        $this->numHv2 = 0;
        $this->total = 0;
    }

}
