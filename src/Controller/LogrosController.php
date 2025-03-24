<?php

namespace App\Controller;

use App\Entity\Jugador;
use App\Entity\Logros;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;;

class LogrosController extends AbstractController
{
    /**
     * @Route("/logros/{id}",methods={"GET"})
     */
    public function getLogrosJugador(int $id, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => $id]);

        $logros = $entityManager->getRepository(Logros::class)->findAll();
        $logrosDelJugador = $jugador->getLogros();

        $logrosJugadorArray = [];

        foreach ($logros as $logro) {
            $logrosJugadorArray[] = [
                'idLogro' => $logro->getIdLogro(),
                'imagen' => $logro->getImagen(),
                'completado' => $logrosDelJugador->contains($logro),
                'descripcion' => $logro->getDescripcion(),
                'titulo' => $logro->getNombre(),
            ];
        }

        return new JsonResponse($logrosJugadorArray, Response::HTTP_OK);
    }
}
