<?php

namespace App\Controller;

use App\Entity\Jugador;
use App\Entity\Mundo;
use App\Entity\MundoJugador;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

use Symfony\Component\Routing\Annotation\Route;

class MundoJugadorController extends AbstractController
{
    /**
     * @Route("/mundoJugador/{id}",methods={"GET"})
     */
    public function getAllMundos(int $id,SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(['id' => $id]);
        $mundosJugador = $entityManager->getRepository(MundoJugador::class)->findBy(['jugador' => $jugador]);

        $result = [];

        foreach ($mundosJugador as $mj) {
            $result[] = [
                'idMundo' => $mj->getMundo()->getIdMundo(),
                'completado' => $mj->isCompletado(),
                'desbloqueado' => $mj->isDesbloqueado(),
            ];
        }

        return new JsonResponse($result, Response::HTTP_OK);

    }
}
