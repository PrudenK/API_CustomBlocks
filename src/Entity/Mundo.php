<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Mundo
 *
 * @ORM\Table(name="mundo")
 * @ORM\Entity
 */
class Mundo
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMundo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Groups ("mundo")
     */
    private $idMundo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=true)
     * @Groups ("mundo")
     */
    private $imagen;

    public function getIdMundo(): int
    {
        return $this->idMundo;
    }

    public function setIdMundo(int $idMundo): void
    {
        $this->idMundo = $idMundo;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): void
    {
        $this->imagen = $imagen;
    }
}
