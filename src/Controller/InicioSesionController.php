<?php

namespace App\Controller;

use App\DTO\JugadorInicioSesionDTO;
use App\Entity\Jugador;
use App\Entity\Logros;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;;

class InicioSesionController extends AbstractController
{
    /**
     * @Route("/inicioSesion/{idJugador}", methods={"GET"})
     */
    public function inicioSesion(
        int $idJugador,
        EntityManagerInterface $em,
        SerializerInterface $serializer
    ): JsonResponse {
        $jugador = $em->getRepository(Jugador::class)->find($idJugador);
        if (!$jugador) {
            return new JsonResponse(['error' => 'Jugador no encontrado'], 404);
        }

        $dto = new JugadorInicioSesionDTO();
        $dto->id = $jugador->getId();
        $dto->nombre = $jugador->getNombre();
        $dto->nivel = $jugador->getNivel();
        $dto->fechaini = $jugador->getFechaini()->format('d-m-Y');
        $dto->experiencia = $jugador->getExperiencia();
        $dto->imagen = $jugador->getImagen();
        $dto->online = $jugador->isOnline();
        $dto->pais = $jugador->getPais();

        // Clan (opcional)
        $clan = $jugador->getClan();
        $dto->clan = $clan ? [
            'idclan' => $clan->getIdclan(),
            'nombre' => $clan->getNombre(),
            'imagen' => $clan->getImagen(),
            'descripcion' => $clan->getDescripcion(),
            'ubicacion' => $clan->getUbicacion(),
            'fechaInit' => $clan->getFechaini()->format('d-m-Y'),
            'idlider' => $clan->getIdlider()->getId(),
        ] : null;

        // Logros
        $logros = $em->getRepository(Logros::class)->findAll();
        $logrosJugador = $jugador->getLogros();
        $dto->listaLogros = array_map(function ($logro) use ($logrosJugador) {
            return [
                'idLogro' => $logro->getIdLogro(),
                'imagen' => $logro->getImagen(),
                'completado' => $logrosJugador->contains($logro),
                'descripcion' => $logro->getDescripcion(),
                'titulo' => $logro->getNombre()
            ];
        }, $logros);

        // Partidas
        $dto->numeroPartidasClasicas = $em->getRepository(\App\Entity\Partida::class)->count([
            'jugador' => $jugador,
            'modo' => 'Clásico'
        ]);

        $qb = $em->createQueryBuilder();
        $dto->numeroLineasAcumuladas = (int) $qb->select('SUM(p.lineas)')
            ->from(\App\Entity\Partida::class, 'p')
            ->where('p.jugador = :jugador')
            ->andWhere('p.modo != :modo')
            ->setParameter('jugador', $jugador)
            ->setParameter('modo', 'Custom')
            ->getQuery()
            ->getSingleScalarResult();

        $qb = $em->createQueryBuilder();
        $dto->puntuacionAcumulada = (int) $qb->select('SUM(p.puntuacion)')
            ->from(\App\Entity\Partida::class, 'p')
            ->where('p.jugador = :jugador')
            ->andWhere('p.modo != :modo')
            ->setParameter('jugador', $jugador)
            ->setParameter('modo', 'Custom')
            ->getQuery()
            ->getSingleScalarResult();

        // Suscripción activa
        $suscripcionesJugador = $em->getRepository(\App\Entity\SuscripcionJugador::class)->findBy(['jugador' => $jugador]);
        $dto->suscripcionDelJugador = ['tipo' => -1, 'fechainicio' => '', 'fechafin' => ''];
        $fechaActual = new \DateTime();
        foreach ($suscripcionesJugador as $suscripcionJugador) {
            if (new \DateTime($suscripcionJugador->getFechafin()) >= $fechaActual) {
                $dto->suscripcionDelJugador = [
                    'tipo' => $suscripcionJugador->getTipo()->getTipo(),
                    'fechainicio' => $suscripcionJugador->getFechainicio(),
                    'fechafin' => $suscripcionJugador->getFechafin()
                ];
                break;
            }
        }

        // Modos de juego
        $dto->listaTusModosDeJuego = json_decode(
            $serializer->serialize($jugador->getModosJuego(), 'json', ['groups' => ['modoJuego']]),
            true
        );

        // Mundos y Niveles
        $dto->listaMundos = json_decode(
            $serializer->serialize($em->getRepository(\App\Entity\Mundo::class)->findAll(), 'json', ['groups' => ['mundo']]),
            true
        );

        $dto->listaNiveles = json_decode(
            $serializer->serialize($em->getRepository(\App\Entity\Nivel::class)->findAll(), 'json', ['groups' => ['nivel', 'mundo']]),
            true
        );

        // Mundos del jugador
        $mundosJugador = $em->getRepository(\App\Entity\MundoJugador::class)->findBy(['jugador' => $jugador]);
        $dto->listaMundosJugador = array_map(function ($mj) {
            return [
                'idMundo' => $mj->getMundo()->getIdMundo(),
                'completado' => $mj->isCompletado(),
                'desbloqueado' => $mj->isDesbloqueado(),
            ];
        }, $mundosJugador);

        // Niveles del jugador
        $nivelesJugador = $em->getRepository(\App\Entity\NivelJugador::class)->findBy(['jugador' => $jugador]);
        $dto->listaNivelesJugador = array_map(function ($nj) {
            return [
                'idNivel' => $nj->getNivel()->getIdNivel(),
                'idMundo' => $nj->getNivel()->getMundo()->getIdMundo(),
                'completado' => $nj->isCompletado(),
                'desbloqueado' => $nj->isDesbloqueado(),
                'mejorTiempo' => $nj->getMejorTiempo(),
                'mejorPuntuacion' => $nj->getMejorPuntuacion(),
                'numIntentos' => $nj->getNumIntentos()
            ];
        }, $nivelesJugador);

        // Lista de suscripciones (todas)
        $dto->listaSuscripciones = json_decode(
            $serializer->serialize($em->getRepository(\App\Entity\Suscripcion::class)->findAll(), 'json', ['groups' => ['suscripcion']]),
            true
        );

        return new JsonResponse($dto, Response::HTTP_OK);
    }
}
