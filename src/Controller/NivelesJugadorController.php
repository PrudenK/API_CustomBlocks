<?php

namespace App\Controller;

use App\Entity\Jugador;
use App\Entity\MundoJugador;
use App\Entity\Nivel;
use App\Entity\NivelJugador;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

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
                'idMundo' => $nj->getNivel()->getMundo()->getIdMundo(),
                'completado' => $nj->isCompletado(),
                'desbloqueado' => $nj->isDesbloqueado(),
                'mejorTiempo' => $nj->getMejorTiempo(),
                'mejorPuntuacion' => $nj->getMejorPuntuacion(),
                'numIntentos' => $nj->getNumIntentos()
            ];
        }

        return new JsonResponse($result, Response::HTTP_OK);
    }

    /**
     * @Route("/nivelPerdido/{id}/{idNivel}",methods={"POST"})
     */
    public function nivelPerdido(int $id,int $idNivel,SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(['id' => $id]);
        $nivel = $entityManager->getRepository(Nivel::class)->findOneBy(['idNivel' => $idNivel]);

        $njActualizar = $entityManager->getRepository(NivelJugador::class)->findOneBy(['nivel' => $nivel, 'jugador' => $jugador]);
        $njActualizar->setNumIntentos($njActualizar->getNumIntentos() + 1);

        $entityManager->persist($njActualizar);
        $entityManager->flush();

        $data = $serializer->serialize(
            $njActualizar, 'json', ['groups' => ['nivel_jugador'] ]
        );

        return new JsonResponse($data,Response::HTTP_OK, [], true);
    }

    /**
     * @Route("/completarNivel/{id}/{idNivel}",methods={"POST"})
     */
    public function completarNivel(int $id, int $idNivel, Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $tiempo = $request->request->get('tiempo');
        $puntuacion = $request->request->get('puntuacion');

        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(['id' => $id]);
        $nivel = $entityManager->getRepository(Nivel::class)->findOneBy(['idNivel' => $idNivel]);

        $njActualizar = $entityManager->getRepository(NivelJugador::class)->findOneBy(['nivel' => $nivel, 'jugador' => $jugador]);

        $njActualizar->setCompletado(true);

        $siguienteNivel = $entityManager->getRepository(Nivel::class)->findOneBy(['idNivel' => $idNivel + 1]);


        if($siguienteNivel){
            $nivelDesbloqueado = $entityManager->getRepository(NivelJugador::class)->findOneBy(['nivel' => $siguienteNivel, 'jugador' => $jugador]);
            $nivelDesbloqueado->setDesbloqueado(true);
            $entityManager->persist($nivelDesbloqueado);
        }

        list($horasN, $minutosN, $segundosN) = explode(':', ltrim($tiempo, "/"));
        $tiempoEnSegundosNuevo = ($horasN * 3600) + ($minutosN * 60) + $segundosN;

        list($horasA, $minutosA, $segundosA) = explode(':', ltrim($njActualizar->getMejorTiempo(), "/"));
        $tiempoEnSegundosAntiguo = ($horasA * 3600) + ($minutosA * 60) + $segundosA;

        if($tiempoEnSegundosNuevo < $tiempoEnSegundosAntiguo || $njActualizar->getMejorTiempo() == "/0:00:00"){
            $njActualizar->setMejorTiempo($tiempo);
        }

        if($puntuacion > $njActualizar->getMejorPuntuacion()){
            $njActualizar->setMejorPuntuacion($puntuacion);
        }

        $njActualizar->setNumIntentos($njActualizar->getNumIntentos() + 1);

        if($idNivel % 9 == 0){
            $siguienteMundo = $siguienteNivel->getMundo();
            $siguienteMundoJugador = $entityManager->getRepository(MundoJugador::class)->findOneBy(["jugador" => $jugador, "mundo" => $siguienteMundo]);
            $siguienteMundoJugador->setDesbloqueado(true);

            $mundoActual = $nivel->getMundo();
            $mundoJugadorActual = $entityManager->getRepository(MundoJugador::class)->findOneBy(["jugador" => $jugador, "mundo" => $mundoActual]);
            $mundoJugadorActual->setCompletado(true);

            $entityManager->persist($siguienteMundoJugador);
            $entityManager->persist($mundoJugadorActual);
        }


        $entityManager->persist($njActualizar);
        $entityManager->flush();

        $data = $serializer->serialize(
            $njActualizar, 'json', ['groups' => ['nivel_jugador'] ]
        );

        return new JsonResponse($data,Response::HTTP_OK, [], true);
    }
}
