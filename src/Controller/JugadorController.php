<?php

namespace App\Controller;

use App\DTO\JugadorInicioSesionDTO;
use App\Entity\Clan;
use App\Entity\Estapiezas;
use App\Entity\Jugador;
use App\Entity\Mundo;
use App\Entity\MundoJugador;
use App\Entity\Nivel;
use App\Entity\NivelJugador;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;;

class JugadorController extends AbstractController
{
    /**
     * @Route("/jugadores",methods={"GET"})
     */
    public function getAllJugadores(SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $jugadores = $entityManager->getRepository(Jugador::class)->findAll();

        $data = $serializer->serialize(
            $jugadores, 'json', ['groups' => ['jugador', 'jugador_logros', 'logros'] ]
        );

        return new JsonResponse($data,Response::HTTP_OK, [], true);
    }

    /**
     * @Route("/jugador/{id}",methods={"GET"})
     */
    public function getJugadorPorID(int $id, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => $id]);

        $data = $serializer->serialize(
            $jugador, 'json', ['groups' => ['jugador', 'clan'] ] //, 'jugador_logros', 'logros'
        );

        return new JsonResponse($data,Response::HTTP_OK, [], true);
    }


    /**
     * @Route("/crearJugador",methods={"POST"})
     */
    public function crearJugador(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {

        $jsonContent = $request->getContent();

        $jugador = $serializer->deserialize($jsonContent, Jugador::class, 'json');

        $comprobarNombre = $entityManager->getRepository(Jugador::class)->findBy(['nombre' => $jugador->getNombre()]);

        if($comprobarNombre){
            return new JsonResponse("El jugador ya existe", Response::HTTP_CONFLICT, [], true);
        }

        $estaPiezas = new Estapiezas();
        $estaPiezas->resetValores();
        $estaPiezas->setIdjugador($jugador);


        $entityManager->persist($jugador);
        $entityManager->persist($estaPiezas);


        //$jugador = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => 5]);

        foreach (range(1, 9) as $numero) {
            $mundoJugador = new MundoJugador();
            $mundoJugador->setJugador($jugador);
            $mundoJugador->setMundo($entityManager->getRepository(Mundo::class)->findOneBy(["idMundo" => $numero]));
            $mundoJugador->setCompletado(false);
            $mundoJugador->setDesbloqueado($numero == 1);
            $entityManager->persist($mundoJugador);
        }

        foreach (range(1, 81) as $numero) {
            $nivelJugador = new NivelJugador();
            $nivelJugador->setNivel($entityManager->getRepository(Nivel::class)->findOneBy(["idNivel" => $numero]));
            $nivelJugador->setJugador($jugador);
            $nivelJugador->setCompletado(false);
            $nivelJugador->setDesbloqueado($numero == 1);
            $nivelJugador->setMejorPuntuacion(0);
            $nivelJugador->setNumIntentos(0);
            $nivelJugador->setMejorTiempo("/0:00:00");
            $entityManager->persist($nivelJugador);
        }

        $entityManager->flush();

        return new JsonResponse(["message" => "Jugador creado correctamente"], Response::HTTP_CREATED);
    }

    /**
     * @Route("/iniciarSesion",methods={"POST"})
     */
    public function iniciarSesion(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $data = json_decode($request->getContent(), true);

        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(['nombre' => $data['nombre']]);

        if (!$jugador) {
            return new JsonResponse(["error" => "Usuario no encontrado"], Response::HTTP_NOT_FOUND);
        }

        if (!$this->comprobarContra($data['contrasena'], $jugador->getContrasena())) {
            return new JsonResponse(["error" => "Contraseña incorrecta"], Response::HTTP_UNAUTHORIZED);
        }

        $jugador->setOnline(true);
        $entityManager->persist($jugador);
        $entityManager->flush();

        return new JsonResponse(["id" => $jugador->getId()], Response::HTTP_OK);
    }

    private function comprobarContra($contraIntro, $contraHash) {
        $parts = explode(":", $contraHash);
        if (count($parts) !== 2) {
            return false;
        }
        $salt = base64_decode($parts[0]);
        $contraHasheada = $parts[1];
        $inputHasheada = $this->hashPassword($contraIntro, $salt);
        return hash_equals($contraHasheada, $inputHasheada);
    }

    function hashPassword($contra, $salt) {
        $hashedPassword = hash("sha256", $salt . $contra, true);
        return base64_encode($hashedPassword);
    }

    /**
     * @Route("/cerrarSesion/{id}",methods={"POST"})
     */
    public function cerrarSesion(int $id, EntityManagerInterface $entityManager)
    {
        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => $id]);

        if (!$jugador) {
            return new JsonResponse(["error" => "Usuario no encontrado"], Response::HTTP_NOT_FOUND);
        }

        $jugador->setOnline(false);
        $entityManager->persist($jugador);
        $entityManager->flush();

        return new JsonResponse(["id" => $jugador->getId()], Response::HTTP_OK);
    }

    /**
     * @Route("/jugador/ping/{id}", methods={"POST"})
     */
    public function pingJugador(int $id, EntityManagerInterface $em): JsonResponse
    {
        $jugador = $em->getRepository(Jugador::class)->find($id);

        if (!$jugador) {
            return new JsonResponse(['error' => 'Jugador no encontrado'], Response::HTTP_NOT_FOUND);
        }

        $jugador->setOnline(true);
        $jugador->setLastSeen(new \DateTime());

        $em->flush();

        return new JsonResponse(['ok' => true], Response::HTTP_OK);
    }



    /**
     * @Route("/subirImagen/{id}", methods={"POST"})
     */
    public function subirImagen(
        int $id,
        Request $request,
        EntityManagerInterface $entityManager
    ) {
        $jugador = $entityManager->getRepository(Jugador::class)->find($id);

        $file = $request->files->get('imagen');
        if (!$file) {
            return new JsonResponse(["error" => "Imagen no recibida"], 478);
        }

        if (!$file instanceof UploadedFile) {
            return new JsonResponse(["error" => "No se ha subido ninguna imagen"], 499);
        }

        $directorioDestino = $this->getParameter('uploads_directory');

        $rutaAnterior = $jugador->getImagen();
        if ($rutaAnterior) {
            $rutaAbsoluta = $directorioDestino . '/' . basename($rutaAnterior);
            if (file_exists($rutaAbsoluta)) {
                @unlink($rutaAbsoluta);
            }
        }

        $nombreArchivo = uniqid() . '.' . $file->guessExtension();

        try {
            $file->move($directorioDestino, $nombreArchivo);
        } catch (FileException $e) {
            return new JsonResponse(["error" => "Error al guardar la imagen"], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        $jugador->setImagen('/uploads/' . $nombreArchivo);
        $entityManager->persist($jugador);
        $entityManager->flush();

        return new JsonResponse([
            "mensaje" => "Imagen subida con éxito",
            "ruta" => '/uploads/' . $nombreArchivo
        ], JsonResponse::HTTP_OK);
    }

    /**
     * @Route("/jugador/{id}/clan",methods={"GET"})
     */
    public function obtenerClanDelJugador(int $id, EntityManagerInterface $entityManager)
    {
        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => $id]);

        $clanDelJugador = $jugador->getClan();

        $idClan = -1;

        if($clanDelJugador) {
            $idClan = $clanDelJugador->getIdclan();
        }

        return new JsonResponse($idClan, Response::HTTP_OK);
    }

    /**
     * @Route("/jugador/{id}/esLider",methods={"GET"})
     */
    public function getSiJugadorEsLiderDeUnClan(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $clan = $entityManager->getRepository(Clan::class)->findOneBy([
            'idlider' => $id
        ]);

        $idClan = $clan ? $clan->getIdclan() : -1;

        return new JsonResponse($idClan, Response::HTTP_OK);
    }

    /**
     * @Route("/jugador/{id}/actualizarExp",methods={"POST"})
     */
    public function actualizarExperiencia(int $id, EntityManagerInterface $entityManager, Request $request): JsonResponse
    {
        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => $id]);

        $exp = $request->request->get('exp');
        $nivel = $request->request->get('nivel');

        $jugador->setExperiencia($exp);
        $jugador->setNivel($nivel);

        $entityManager->persist($jugador);
        $entityManager->flush();

        return new JsonResponse("ok", Response::HTTP_OK);
    }

    /**
     * @Route("/jugador/{id}/posicion", methods={"GET"})
     */
    public function getPosicionJugadorPorExperiencia(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $jugador = $entityManager->getRepository(Jugador::class)->find($id);

        if (!$jugador) {
            return new JsonResponse(["error" => "Jugador no encontrado"], Response::HTTP_NOT_FOUND);
        }

        $experienciaJugador = $jugador->getExperiencia() ?? 0;

        $qb = $entityManager->createQueryBuilder();

        $qb->select('COUNT(j.id)')
            ->from(Jugador::class, 'j')
            ->where('j.experiencia > :exp')
            ->setParameter('exp', $experienciaJugador);

        $jugadoresConMasExp = $qb->getQuery()->getSingleScalarResult();

        $posicion = (int)$jugadoresConMasExp + 1;

        return new JsonResponse($posicion, Response::HTTP_OK);
    }

}
