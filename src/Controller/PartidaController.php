<?php

namespace App\Controller;

use App\Entity\Estapiezas;
use App\Entity\Jugador;
use App\Entity\Logros;
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
    public function subirPartida(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager)
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

    /**
     * @Route("/numPartidasClasicas/{id}",methods={"GET"})
     */
    public function getNumeroPartidasClasicas(int $id, EntityManagerInterface $entityManager)
    {
        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => $id]);

        $numeroClasicas = $entityManager->getRepository(Partida::class)->count([
            'jugador' => $jugador,
            'modo' => 'Clásico'
        ]);

        return new JsonResponse($numeroClasicas, Response::HTTP_OK);
    }

    /**
     * @Route("/numLineas/{id}",methods={"GET"})
     */
    public function getNumeroLineas(int $id, EntityManagerInterface $entityManager)
    {
        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => $id]);

        $qb = $entityManager->createQueryBuilder();

        $sumaLineas = $qb->select('SUM(p.lineas)')
            ->from(Partida::class, 'p')
            ->where('p.jugador = :jugador')
            ->andWhere('p.modo != :modo')
            ->setParameter('jugador', $jugador)
            ->setParameter('modo', 'Custom')
            ->getQuery()
            ->getSingleScalarResult();

        return new JsonResponse((int)$sumaLineas, Response::HTTP_OK);
    }

    /**
     * @Route("/puntuacion/{id}",methods={"GET"})
     */
    public function getNumeroPuntos(int $id, EntityManagerInterface $entityManager)
    {
        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => $id]);

        $qb = $entityManager->createQueryBuilder();

        $sumaLineas = $qb->select('SUM(p.puntuacion)')
            ->from(Partida::class, 'p')
            ->where('p.jugador = :jugador')
            ->andWhere('p.modo != :modo')
            ->setParameter('jugador', $jugador)
            ->setParameter('modo', 'Custom')
            ->getQuery()
            ->getSingleScalarResult();

        return new JsonResponse((int)$sumaLineas, Response::HTTP_OK);
    }


    /**
     * @Route("/estadisticasModos/{idJugador}/{modo}", methods={"GET"})
     */
    public function estadisticasPorModoYJugador(
        int $idJugador,
        string $modo,
        EntityManagerInterface $entityManager
    ) {
        $partidaRepo = $entityManager->getRepository(Partida::class);

        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => $idJugador]);

        if ($modo === "Todos") {
            $query = $entityManager->createQuery(
                'SELECT p FROM App\Entity\Partida p WHERE p.jugador = :jugador AND p.modo != :modoCustom'
            )->setParameter('jugador', $jugador)
                ->setParameter('modoCustom', 'Custom');

            $partidas = $query->getResult();
        } else {
            // Si el modo es específico, buscar por ese modo
            $partidas = $partidaRepo->findBy([
                "modo" => $modo,
                "jugador" => $jugador
            ]);
        }

        $maxNivel = 0;
        $maxLineas = 0;
        $maxPuntuacion = 0;
        $maxTiempo = "00:00:00";
        $lineasSum = 0;
        $puntuacionesSum = 0;
        $tiempoTotalSegundos = 0;
        $totalPartidas = 0;

        foreach ($partidas as $partida) {
            $maxNivel = max($maxNivel, $partida->getNivel());
            $maxLineas = max($maxLineas, $partida->getLineas());
            $maxPuntuacion = max($maxPuntuacion, $partida->getPuntuacion());
            $maxTiempo = max($maxTiempo, $partida->getTiempo()); // El tiempo ya viene en HH:MM:SS

            $lineasSum += $partida->getLineas();
            $puntuacionesSum += $partida->getPuntuacion();

            list($horas, $minutos, $segundos) = explode(":", $partida->getTiempo());
            $tiempoTotalSegundos += ($horas * 3600) + ($minutos * 60) + $segundos;
            $totalPartidas +=1;
        }

        $tiempoTotal = gmdate("H:i:s", $tiempoTotalSegundos);

        $response = [
            "maxNivel" => $maxNivel,
            "maxLineas" => $maxLineas,
            "maxPuntuacion" => $maxPuntuacion,
            "maxTiempo" => $maxTiempo,
            "lineasSum" => $lineasSum,
            "puntuacionesSum" => $puntuacionesSum,
            "tiempoTotal" => $tiempoTotal,
            "totalDePartidas" => $totalPartidas,
        ];

        return new JsonResponse($response, Response::HTTP_OK);
    }


    /**
     * @Route("/mejoresPartidas/{pais}/{modo}", methods={"GET"})
     */
    public function mejoresPartidas(
        string $pais,
        string $modo,
        EntityManagerInterface $entityManager
    ) {
        $qb = $entityManager->createQueryBuilder();

        $qb->select(
            'j.nombre',
            'j.nivel AS nivelJugador',
            'p.nivel AS nivelPartida',
            'p.lineas',
            'p.puntuacion',
            'p.tiempo',
            'j.pais'
        )
            ->from(Partida::class, 'p')
            ->join('p.jugador', 'j')
            ->where('p.modo = :modo')
            ->setParameter('modo', $modo)
            ->orderBy('p.nivel', 'DESC')
            ->addOrderBy('p.lineas', 'DESC')
            ->addOrderBy('p.puntuacion', 'DESC')
            ->setMaxResults(100);

        if ($pais !== "Global") {
            $qb->andWhere('j.pais = :pais')
                ->setParameter('pais', $pais);
        }

        $resultados = $qb->getQuery()->getResult();

        return new JsonResponse($resultados, Response::HTTP_OK);
    }


    /**
     * @Route("/partidasDelJugador/{idJugador}/{modo}", methods={"GET"})
     */
    public function partidasDelJugador(
        int $idJugador,
        string $modo,
        EntityManagerInterface $entityManager
    ) {
        $jugador = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => $idJugador]);

        if($modo == "Todos"){
            $partidas = $entityManager->getRepository(Partida::class)->findBy(["jugador" => $jugador]);
        }else{
            $partidas = $entityManager->getRepository(Partida::class)->findBy([
                "jugador" => $jugador,
                "modo" => $modo
            ]);
        }

        $result = [];

        foreach ($partidas as $partida) {
            $result[] = [
                "idPartida" => $partida->getIdPartida(),
                "idJugador" => $jugador->getId(),
                "modo" => $partida->getModo(),
                "nivel" => $partida->getNivel(),
                "puntuacion" => $partida->getPuntuacion(),
                "tiempo" => $partida->getTiempo(),
                "lineas" => $partida->getLineas(),
                "fechaJuego" => $partida->getFechaJuego()->format("Y-m-d H:i:s") // formato compatible con Date en Kotlin
            ];
        }

        return new JsonResponse($result, Response::HTTP_OK);
    }

}
