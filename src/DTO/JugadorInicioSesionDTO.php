<?php

namespace App\DTO;

class JugadorInicioSesionDTO
{
    public int $id;
    public string $nombre;
    public int $nivel;
    public string $fechaini;
    public string $pais;
    public int $experiencia;
    public ?array $clan;
    public ?string $imagen;
    public bool $online = false;

    public array $listaLogros;
    public int $numeroPartidasClasicas;
    public int $numeroLineasAcumuladas;
    public int $puntuacionAcumulada;
    public array $suscripcionDelJugador;
    public array $listaTusModosDeJuego;
    public array $listaMundos;
    public array $listaNiveles;
    public array $listaMundosJugador;
    public array $listaNivelesJugador;
    public array $listaSuscripciones;
    public array $listaPartidasGuardadas;
}
