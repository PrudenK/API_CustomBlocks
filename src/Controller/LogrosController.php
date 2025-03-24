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

    /**
     * @Route("/logros/{id}/{idJugador}",methods={"POST"})
     */
    public function completarLogro(int $id,int $idJugador, EntityManagerInterface $entityManager)
    {
        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => $idJugador]);
        $logro = $entityManager->getRepository(Logros::class)->findOneBy(["idlogro" => $id]);
        $logrosDelJugador = $jugador->getLogros();

        if(!$logrosDelJugador->contains($logro)){
            $logrosDelJugador->add($logro);
            $jugador->setLogros($logrosDelJugador);

            $entityManager->persist($jugador);
            $entityManager->flush();
        }

        return new JsonResponse("Logro completado", Response::HTTP_OK);
    }
}
