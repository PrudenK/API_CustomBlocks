<?php

namespace App\Controller;

use App\Entity\Jugador;
use App\Entity\PartidaPvp;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;





class PartidaPVPController extends AbstractController
{
    /**
     * @Route("/subirPartidaPVP",methods={"POST"})
     */
    public function subirPartidaPVP(Request $request, EntityManagerInterface $entityManager)
    {
        $data = json_decode($request->getContent(), true);

        $host = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => $data['host']]);
        $visi = $entityManager->getRepository(Jugador::class)->findOneBy(["id" => $data['visitante']]);

        $partidaPVP = new PartidaPVP();
        $partidaPVP->setHost($host);
        $partidaPVP->setVisitante($visi);
        $partidaPVP->setModo($data['modo']);
        $partidaPVP->setResultado($data['resultado']);
        $partidaPVP->setFecha(new \DateTime());

        $entityManager->persist($partidaPVP);
        $entityManager->flush();

        return new JsonResponse(["message" => "Partida PVP guardada con éxito"], Response::HTTP_CREATED);
    }

    /**
     * @Route("/getPartidasJugador/{id}", methods={"GET"})
     */
    public function getPartidasPVPporUsuario(
        int $id,
        SerializerInterface $serializer,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        $jugador = $entityManager->getRepository(Jugador::class)->find($id);

        if (!$jugador) {
            return new JsonResponse(['error' => 'Jugador no encontrado'], JsonResponse::HTTP_NOT_FOUND);
        }

        $repo = $entityManager->getRepository(\App\Entity\PartidaPvp::class);

        $comoHost = $repo->findBy(['host' => $jugador]);
        $comoVisitante = $repo->findBy(['visitante' => $jugador]);

        $partidas = array_merge($comoHost, $comoVisitante);

        $partidasFormateadas = [];

        foreach ($partidas as $pvp) {
            $partidasFormateadas[] = [
                'id' => $pvp->getId(),
                'host' => $pvp->getHost()->getNombre(),
                'visitante' => $pvp->getVisitante()->getNombre(),
                'modo' => $pvp->getModo(),
                'resultado' => $pvp->getResultado(),
                'fecha' => $pvp->getFecha()->format('Y-m-d H:i:s')
            ];
        }

        return new JsonResponse($partidasFormateadas, JsonResponse::HTTP_OK);
    }


}
