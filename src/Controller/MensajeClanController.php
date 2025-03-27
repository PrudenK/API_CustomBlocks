<?php

namespace App\Controller;

use App\Entity\Clan;
use App\Entity\Jugador;
use App\Entity\MensajeClan;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;;

class MensajeClanController extends AbstractController
{
    /**
     * @Route("/guardarMensajeClan", methods={"POST"})
     */
    public function guardarMensaje(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $clan = $em->getRepository(Clan::class)->findOneBy(["idclan" => $data["clanId"]]);

        $mensaje = new MensajeClan();
        $mensaje->setClan($clan);
        $mensaje->setRemitente($data['remitente']);
        $mensaje->setMensaje($data['mensaje']);
        $mensaje->setFecha(new \DateTime());

        $em->persist($mensaje);
        $em->flush();

        return new JsonResponse(['status' => 'ok'], 201);
    }

    /**
     * @Route("/mensajesDelClan/{idClan}", methods={"GET"})
     */
    public function obtenerMensajes(int $idClan, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $clan = $em->getRepository(Clan::class)->findOneBy(["idclan" => $idClan]);

        $mensajes = $em->getRepository(MensajeClan::class)->findBy(
            ['clan' => $clan],
            ['fecha' => 'ASC']
        );

        $data = $serializer->serialize($mensajes, 'json', ['groups' => ['mensaje_clan']]);

        return new JsonResponse($data, 200, [], true);
    }
}
