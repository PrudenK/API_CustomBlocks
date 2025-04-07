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
}
