<?php

namespace App\Controller;

use App\Entity\Clan;
use App\Entity\Jugador;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;;

class ClanController extends AbstractController
{
    /**
     * @Route("/crearClan",methods={"POST"})
     */
    public function crearClan(Request $request, EntityManagerInterface $em)
    {
        $nombre = $request->request->get('nombre');

        $clanExistente = $em->getRepository(Clan::class)->findOneBy(['nombre' => $nombre]);

        if ($clanExistente) {
            return new JsonResponse(['error' => 'Ya existe un clan con ese nombre'], 409);
        }

        $descripcion = $request->request->get('descripcion');
        $ubicacion = $request->request->get('ubicacion');
        $idLider = $request->request->get('idLider');
        $imagenFile = $request->files->get('imagen');


        if (!$nombre || !$idLider) {
            return new JsonResponse(['error' => 'Datos incompletos'], 400);
        }

        $jugador = $em->getRepository(Jugador::class)->findOneBy(["id" => $idLider]);
        if (!$jugador) {
            return new JsonResponse(['error' => 'Jugador no encontrado'], 404);
        }


        $nombreArchivo = null;
        if ($imagenFile) {
            if (!$imagenFile instanceof UploadedFile) {
                return new JsonResponse(["error" => "No se ha subido ninguna imagen"], 499);
            }

            $directorioBase = $this->getParameter('uploads_directory');
            $directorioDestino = $directorioBase . '/clanes';

            if (!is_dir($directorioDestino)) {
                mkdir($directorioDestino, 0775, true);
            }

            $nombreArchivo = uniqid() . '.' . $imagenFile->guessExtension();

            try {
                $imagenFile->move($directorioDestino, $nombreArchivo);
            } catch (FileException $e) {
                return new JsonResponse(["error" => "Error al guardar la imagen"], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

        $clan = new Clan();
        $clan->setNombre($nombre);
        $clan->setDescripcion($descripcion);
        $clan->setUbicacion($ubicacion);
        if ($nombreArchivo) {
            $clan->setImagen('/uploads/clanes/' . $nombreArchivo);
        }
        $clan->setIdLider($jugador);
        $clan->setFechaini(new \DateTime());

        $jugador->setClan($clan);

        $em->persist($clan);
        $em->persist($jugador);
        $em->flush();



        return new JsonResponse(['mensaje' => 'Clan creado exitosamente'], 201);
    }


    /**
     * @Route("/clan/{id}/jugadores",methods={"GET"})
     */
    public function obtenerClanDelJugador(int $id, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $clan = $entityManager->getRepository(Clan::class)->findOneBy(["idclan" => $id]);

        $jugadores = $clan->getJugadores();

        $data = $serializer->serialize(
            $jugadores, 'json', ['groups' => ['jugador', 'clan'] ]
        );

        return new JsonResponse($data,Response::HTTP_OK, [], true);
    }

    /**
     * @Route("/clan/{id}",methods={"GET"})
     */
    public function obtenerDatosDeUnClan(int $id, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $clan = $entityManager->getRepository(Clan::class)->findOneBy(["idclan" => $id]);

        $data = $serializer->serialize(
            $clan, 'json', ['groups' => ['clan'] ]
        );

        return new JsonResponse($data,Response::HTTP_OK, [], true);
    }


}
