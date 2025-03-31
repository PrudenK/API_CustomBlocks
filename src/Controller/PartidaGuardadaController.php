<?php

namespace App\Controller;

use App\Entity\Clan;
use App\Entity\Jugador;
use App\Entity\MensajeClan;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PartidaGuardadaController extends AbstractController
{

}
