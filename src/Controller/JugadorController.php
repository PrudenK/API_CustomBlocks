<?php

namespace App\Controller;

use App\Entity\Estapiezas;
use App\Entity\Jugador;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class JugadorController extends AbstractController
{
    /**
     * @Route("/jugadores",methods={"GET"})
     */
    public function getAllJugadores(SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $jugadores = $entityManager->getRepository(Jugador::class)->findAll();

        $data = $serializer->serialize(
            $jugadores, 'json', ['groups' => ['jugador'] ]
        );

        return new JsonResponse($data,Response::HTTP_OK, [], true);
    }

    /**
     * @Route("/crearJugador",methods={"POST"})
     */
    public function crearJugador(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    { //TODO retormar implementación cuando tenga creados todos los niveles
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
}
