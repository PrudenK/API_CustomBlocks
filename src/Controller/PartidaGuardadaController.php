<?php

namespace App\Controller;

use App\DTO\PartidaGuardadaDTO;
use App\Entity\Clan;
use App\Entity\Jugador;
use App\Entity\MensajeClan;
use App\Entity\PartidaGuardada;
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
    /**
     * @Route("/guardarPartida",methods={"POST"})
     */
    public function guardar(Request $request, SerializerInterface $serializer, EntityManagerInterface $em): JsonResponse
    {
        try {
            $data = $request->getContent();

            /** @var PartidaGuardadaDTO $dto */
            $dto = $serializer->deserialize($data, PartidaGuardadaDTO::class, 'json');

            $jugador = $em->getRepository(Jugador::class)->findOneBy(["id" => $dto->idJugador]);

            if (!$jugador) {
                return new JsonResponse(['error' => 'Jugador no encontrado'], 404);
            }

            $partida = new PartidaGuardada();
            $partida->setIdJugador($jugador);
            $partida->setNumPartidaGuardada($dto->numPartidaGuardada);
            $partida->setModo($dto->modo);
            $partida->setTiempo($dto->tiempo);
            $partida->setPuntuacion($dto->puntuacion);
            $partida->setLineas($dto->lineas);
            $partida->setNivel($dto->nivel);
            $partida->setTableroPartida($dto->tableroPartida);
            $partida->setTamaTablero($dto->tamaTablero);
            $partida->setDiseTablero($dto->diseTablero);
            $partida->setDiseTableroSecun($dto->diseTableroSecun);
            $partida->setSiguientesPiezasActivo($dto->siguientesPiezasActivo);
            $partida->setSiguientesPiezas($dto->siguientesPiezas);
            $partida->setArrayPiezas($dto->arrayPiezas);
            $partida->setDisePiezas($dto->disePiezas);
            $partida->setHoldActivo($dto->holdActivo);
            $partida->setDashActivo($dto->dashActivo);
            $partida->setPiezaEnHold($dto->piezaEnHold);
            $partida->setPuedeHoldear($dto->puedeHoldear);
            $partida->setVelocidadCaidaActual($dto->velocidadCaidaActual);
            $partida->setLineasParaSaltoDeNivel($dto->lineasParaSaltoDeNivel);
            $partida->setSaltoDeTiempoPorNivel($dto->saltoDeTiempoPorNivel);
            $partida->setLimiteRotaciones($dto->limiteRotaciones);
            $partida->setPiezaActual($dto->piezaActual);
            $partida->setPosicionPiezaActual($dto->posicionPiezaActual);
            $partida->setNumRotacionesDeLaPiezaActual($dto->numRotacionesDeLaPiezaActual);

            $em->persist($partida);
            $em->flush();

            $partidasGuardadas = $em->getRepository(\App\Entity\PartidaGuardada::class)->findBy([
                'idJugador' => $jugador
            ]);

            $data = $serializer->serialize(
                $partidasGuardadas, 'json', ['groups' => ['partidaGuardada'] ]
            );

            return new JsonResponse($data,Response::HTTP_OK, [], true);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @Route("/eliminarPartidaGuardada/{idJugador}/{numPartidaGuardada}", methods={"DELETE"})
     */
    public function eliminarPartidaGuardada(int $idJugador, int $numPartidaGuardada, EntityManagerInterface $em): JsonResponse {
        try {
            $jugador = $em->getRepository(Jugador::class)->findOneBy(["id" => $idJugador]);

            if (!$jugador) {
                return new JsonResponse(['error' => 'Jugador no encontrado'], 404);
            }

            $partida = $em->getRepository(PartidaGuardada::class)->findOneBy([
                'idJugador' => $jugador,
                'numPartidaGuardada' => $numPartidaGuardada
            ]);

            if (!$partida) {
                return new JsonResponse(['error' => 'Partida no encontrada'], 404);
            }

            $em->remove($partida);
            $em->flush();

            return new JsonResponse(['success' => true, 'mensaje' => 'Partida eliminada'], 200);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
