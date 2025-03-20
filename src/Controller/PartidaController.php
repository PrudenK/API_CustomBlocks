<?php

namespace App\Controller;

use App\Entity\Estapiezas;
use App\Entity\Jugador;
use App\Entity\Partida;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;


class PartidaController extends AbstractController
{
    /**
     * @Route("/subirPartida",methods={"POST"})
     */
    public function crearJugador(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $data = json_decode($request->getContent(), true);

        $jugador = $entityManager->getRepository(Jugador::class)->find($data['idJugador']);

        $partida = new Partida();
        $partida->setJugador($jugador);
        $partida->setModo($data['modo']);
        $partida->setNivel($data['nivel']);
        $partida->setPuntuacion($data['puntuacion']);
        $partida->setTiempo($data['tiempo']);
        $partida->setLineas($data['lineas']);
        $partida->setFechaJuego(new \DateTime($data['fechaJuego']));

        // Guardar en la base de datos
        $entityManager->persist($partida);
        $entityManager->flush();

        return new JsonResponse(["message" => "Partida guardada con éxito", "idPartida" => $partida->getIdpartida()], Response::HTTP_CREATED);
    }
}
