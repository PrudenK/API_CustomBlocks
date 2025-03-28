<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;;
use Symfony\Component\HttpFoundation\Request;


class ModoDeJuegoController extends AbstractController
{


    /**
     * @Route("/clan/{id}/unirse/{idJugador}",methods={"POST"})
     */
    public function jugadorSeUneAUnClan(Request $request, EntityManagerInterface $entityManager)
    {







        return new JsonResponse("Ok",Response::HTTP_OK);
    }


}
