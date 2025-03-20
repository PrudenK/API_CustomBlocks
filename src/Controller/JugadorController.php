<?php

namespace App\Controller;

use App\Entity\Jugador;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

class JugadorController extends AbstractController
{
    /**
     * @Route("/jugadores",methods={"GET"})
     */
    public function getAllJugadores(SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        //
        $jugadores = $entityManager->getRepository(Jugador::class)->findAll();

        $data = $serializer->serialize(
            $jugadores, 'json', ['groups' => ['jugador', 'jugador_partidas'] ]
        );

        return new JsonResponse($data,Response::HTTP_OK, [], true);
    }
}
