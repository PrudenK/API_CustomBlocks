<?php

namespace App\Controller;

use App\Entity\Jugador;
use App\Entity\Partida;
use App\Entity\Suscripcion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class SuscripcionesController extends AbstractController
{
    /**
     * @Route("/suscripciones",methods={"GET"})
     */
    public function getAllSuscripciones(SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $suscripciones = $entityManager->getRepository(Suscripcion::class)->findAll();

        $data = $serializer->serialize(
            $suscripciones, 'json', ['groups' => ['suscripcion']]
        );

        return new JsonResponse($data,Response::HTTP_OK, [], true);
    }
}
