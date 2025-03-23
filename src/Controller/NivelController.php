<?php

namespace App\Controller;

use App\Entity\Mundo;
use App\Entity\Nivel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

class NivelController extends AbstractController
{
    /**
     * @Route("/niveles",methods={"GET"})
     */
    public function getAllNiveles(SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $niveles = $entityManager->getRepository(Nivel::class)->findAll();

        $data = $serializer->serialize(
            $niveles, 'json', ['groups' => ['nivel', 'mundo'] ]
        );

        return new JsonResponse($data,Response::HTTP_OK, [], true);
    }
}
