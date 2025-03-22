<?php

namespace App\Controller;

use App\Entity\Mundo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

use Symfony\Component\Routing\Annotation\Route;


class MundoController extends AbstractController
{
    /**
     * @Route("/mundos",methods={"GET"})
     */
    public function getAllMundos(SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {
        $mundos = $entityManager->getRepository(Mundo::class)->findAll();

        $data = $serializer->serialize(
            $mundos, 'json', ['groups' => ['mundo'] ]
        );

        return new JsonResponse($data,Response::HTTP_OK, [], true);
    }
}
