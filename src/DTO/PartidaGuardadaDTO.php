<?php

namespace App\DTO;

class PartidaGuardadaDTO
{
    public int $idJugador;
    public int $numPartidaGuardada;
    public string $modo;
    public string $tiempo;
    public int $puntuacion;
    public int $lineas;
    public int $nivel;
    public array $tableroPartida;
    public int $tamaTablero;
    public int $diseTablero;
    public int $diseTableroSecun;
    public int $siguientesPiezasActivo;
    public string $siguientesPiezas;
    public string $arrayPiezas;
    public int $disePiezas;
    public int $holdActivo;
    public int $dashActivo;
    public string $piezaEnHold;
    public int $puedeHoldear;
    public int $velocidadCaidaActual;
    public int $lineasParaSaltoDeNivel;
    public int $saltoDeTiempoPorNivel;
    public int $limiteRotaciones;
    public string $piezaActual;
    public string $posicionPiezaActual;
    public int $numRotacionesDeLaPiezaActual;
}
