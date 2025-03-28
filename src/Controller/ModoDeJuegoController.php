<?php

namespace App\Controller;

use App\Entity\Jugador;
use App\Entity\ModosJuego;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;;


class ModoDeJuegoController extends AbstractController
{


    /**
     * @Route("/crearModoJuego",methods={"POST"})
     */
    public function crearModoJuego(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager): Response {
        $modoJuegoJson = $request->request->get('modoJuego');

        if (!$modoJuegoJson) {
            return new JsonResponse(["error" => "No se recibió el objeto modoJuego"], 400);
        }

        $data = json_decode($modoJuegoJson, true);

        if (!isset($data['idJugador'])) {
            return new JsonResponse(["error" => "idJugador no proporcionado"], 400);
        }

        $jugador = $entityManager->getRepository(Jugador::class)->find($data['idJugador']);

        if (!$jugador) {
            return new JsonResponse(["error" => "Jugador no encontrado"], 404);
        }

        unset($data['idJugador']);
        $modoJuegoJsonSinJugador = json_encode($data);
        $modoJuego = $serializer->deserialize($modoJuegoJsonSinJugador, ModosJuego::class, 'json');

        $modoJuego->setJugador($jugador);

        $file = $request->files->get('imagen');
        if ($file instanceof UploadedFile) {
            $directorioBase = $this->getParameter('uploads_directory');
            $nombreArchivo = uniqid() . '.' . $file->guessExtension();
            $directorioDestino = $directorioBase . '/modosDeJuego';
            try {
                $file->move($directorioDestino, $nombreArchivo);
                $modoJuego->setImagen('/uploads/modosDeJuego/' . $nombreArchivo);
            } catch (FileException $e) {
                return new JsonResponse(["error" => "Error al subir la imagen"], 500);
            }
        }

        $ultimoModo = $entityManager->getRepository(ModosJuego::class)
            ->createQueryBuilder('m')
            ->select('MAX(m.idnummodo)')
            ->where('m.jugador = :jugador')
            ->setParameter('jugador', $jugador)
            ->getQuery()
            ->getSingleScalarResult();

        $nuevoIdNumModo = ($ultimoModo ?? 0) + 1;
        $modoJuego->setIdnummodo($nuevoIdNumModo);

        $entityManager->persist($modoJuego);
        $entityManager->flush();

        return new JsonResponse([
            "mensaje" => "Modo de juego creado correctamente",
            "rutaImagen" => $modoJuego->getImagen()
        ], 201);
    }

    /**
     * @Route("/modosJugador/{idJugador}",methods={"GET"})
     */
    public function getTodosModosPorJugador(int $idJugador, Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager): Response {
        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => $idJugador]);

        $modosDeJuego = $entityManager->getRepository(ModosJuego::class)->findBy(["jugador" => $jugador]);

        $data = $serializer->serialize(
            $modosDeJuego, 'json', ['groups' => ['modoJuego'] ]
        );

        return new JsonResponse($data,Response::HTTP_OK, [], true);
    }
}
