<?php

namespace App\Controller;

use App\Entity\Jugador;
use App\Entity\Suscripcion;
use App\Entity\SuscripcionJugador;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

class SuscripcionJugadorController extends AbstractController
{
    /**
     * @Route("/suscribirse/{idJugador}/{tipo}",methods={"POST"})
     * @throws \DateMalformedStringException
     */
    public function jugadorSeSuscribe(int $idJugador, int $tipo, SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => $idJugador]);
        $suscripcion = $entityManager->getRepository(Suscripcion::class)->findOneBy(["tipo" => $tipo]);

        $fechaActual = new \DateTime();

        $suscripcionesJugador = $entityManager->getRepository(SuscripcionJugador::class)->findBy([
            'jugador' => $jugador
        ]);

        foreach ($suscripcionesJugador as $suscripcionJugador) {
            $fechaFin = new \DateTime($suscripcionJugador->getFechafin());
            if ($fechaFin >= $fechaActual) {
                return new JsonResponse('Ya tienes una suscripción activa', Response::HTTP_CONFLICT);
            }
        }

        $fechaInicio = new \DateTime();
        $fechaFin = (clone $fechaInicio)->modify('+31 days');

        $nuevaSuscripcionJugador = new SuscripcionJugador();
        $nuevaSuscripcionJugador->setJugador($jugador);
        $nuevaSuscripcionJugador->setTipo($suscripcion);
        $nuevaSuscripcionJugador->setFechainicio($fechaInicio->format('Y-m-d'));
        $nuevaSuscripcionJugador->setFechafin($fechaFin->format('Y-m-d'));

        $entityManager->persist($nuevaSuscripcionJugador);
        $entityManager->flush();

        $data = $serializer->serialize(
            $nuevaSuscripcionJugador,
            'json',
            ['groups' => ['suscripcionJugador', 'suscripcionJugador_tipo', 'suscripcion']]
        );

        return new JsonResponse($data, Response::HTTP_CREATED, [], true);
    }
}
