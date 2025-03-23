<?php

namespace App\Controller;

use App\Entity\Jugador;
use App\Entity\MundoJugador;
use App\Entity\NivelJugador;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

class NivelesJugadorController extends AbstractController
{
    /**
     * @Route("/nivelJugador/{id}",methods={"GET"})
     */
    public function getAllNivelesJugador(int $id,SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(['id' => $id]);
        $nivelesJugador = $entityManager->getRepository(NivelJugador::class)->findBy(['jugador' => $jugador]);

        $result = [];

        foreach ($nivelesJugador as $nj) {
            $result[] = [
                'idNivel' => $nj->getNivel()->getIdNivel(),
                'completado' => $nj->isCompletado(),
                'desbloqueado' => $nj->isDesbloqueado(),
                'mejorTiempo' => $nj->getMejorTiempo(),
                'mejorPuntuacion' => $nj->getMejorPuntuacion(),
                'mejorLineas' => $nj->getMejorLineas(),
                'numIntentos' => $nj->getNumIntentos()
            ];
        }

        return new JsonResponse($result, Response::HTTP_OK);
    }
}
