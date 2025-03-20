<?php

namespace App\Controller;

use App\Entity\Estapiezas;
use App\Entity\Jugador;
use App\Entity\Partida;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class EstaPiezasController extends AbstractController
{

    /**
     * @Route("/subirEstaPiezas",methods={"POST"})
     */
    public function subirEstaPiezas(Request $request, EntityManagerInterface $entityManager)
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['idJugador'], $data['listaPiezas'])) {
            return new JsonResponse(["error" => "Datos inválidos"], Response::HTTP_BAD_REQUEST);
        }

        $idJugador = $data['idJugador'];
        $listaPiezas = explode("_", $data['listaPiezas']);

        $jugador = $entityManager->getRepository(Jugador::class)->find($idJugador);

        $estapiezas = $entityManager->getRepository(Estapiezas::class)->findOneBy(['idjugador' => $jugador]);

        if (!$estapiezas) {
            return new JsonResponse(["error" => "Registro de piezas no encontrado"], Response::HTTP_NOT_FOUND);
        }

        $atributos = [
            'numo', 'numi', 'numl', 'numz', 'numj', 'nums', 'numt', 'nump', 'numx', 'numu',
            'numlv2', 'numw', 'numtv2', 'numzv2', 'numxv2', 'numlv3', 'numf', 'numov2', 'numsv2', 'numb',
            'numy', 'numk', 'numiv2', 'numc', 'numov3', 'numv', 'numh', 'numiv3', 'numyv2', 'numov4',
            'numjv2', 'numa', 'numminii', 'numminiiv2', 'numminil', 'numminio', 'numov5', 'numov6', 'numxv3',
            'nume', 'numtwino', 'numtwiny', 'numpickaxe', 'numsv3', 'numtwinov2', 'numzv3', 'numladder', 'numhv2', 'total'
        ];

        $longitudLista = min(count($listaPiezas), count($atributos));

        $incrementoTotal = 0;

        for ($i = 0; $i < $longitudLista; $i++) {
            $campo = $atributos[$i];
            $valorActual = call_user_func([$estapiezas, 'get' . ucfirst($campo)]); // Obtener el valor actual
            $nuevoValor = $valorActual + (int) $listaPiezas[$i]; // Sumar la cantidad
            call_user_func([$estapiezas, 'set' . ucfirst($campo)], $nuevoValor); // Establecer el nuevo valor

            $incrementoTotal += (int) $listaPiezas[$i];
        }

        $estapiezas->setTotal($estapiezas->getTotal() + $incrementoTotal);

        // Guardar cambios en la base de datos
        $entityManager->persist($estapiezas);
        $entityManager->flush();

        return new JsonResponse(["mensaje" => "Datos actualizados correctamente"], Response::HTTP_OK);
    }
    //TODO fix en total
}
