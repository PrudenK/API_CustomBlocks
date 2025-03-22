SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

DROP DATABASE IF EXISTS `baseCustom`;

CREATE DATABASE `baseCustom`;

USE `baseCustom`;

CREATE TABLE jugador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    contrasena VARCHAR(255),
    nivel INT,
    fechaini DATE,
    pais VARCHAR(100),
    experiencia INT,
    clan INT NULL,
    imagen VARCHAR(255),
    FOREIGN KEY (clan) REFERENCES clan(idClan) ON DELETE SET NULL
);

CREATE TABLE suscripcion (
     tipo         INT PRIMARY KEY,
     nombre       VARCHAR(50),
     precio       VARCHAR(20),
     numModos     INT,
     numPartidasGuardadas INT,
     imagen VARCHAR(255)
);

CREATE TABLE clan (
      idClan INT AUTO_INCREMENT PRIMARY KEY,
      nombre VARCHAR(100),
      fechaini DATE,
      idLider INT,
      FOREIGN KEY (idLider) REFERENCES jugador(id) ON DELETE CASCADE
);


CREATE TABLE suscripcion_jugador (
     idJugador    INT,
     fechaFin     VARCHAR(10),
     tipo         INT,
     fechaInicio  VARCHAR(10),

     PRIMARY KEY (idJugador, fechaFin),
     FOREIGN KEY (idJugador) REFERENCES jugador(id) ON DELETE CASCADE,
     FOREIGN KEY (tipo) REFERENCES suscripcion(tipo) ON DELETE CASCADE
);

CREATE TABLE partida (
     idPartida INT AUTO_INCREMENT PRIMARY KEY,
     idJugador INT,
     modo VARCHAR(100),
     nivel INT,
     puntuacion INT,
     tiempo VARCHAR(50),
     lineas INT,
     fechaJuego varchar(50),
     FOREIGN KEY (idJugador) REFERENCES jugador(id) ON DELETE CASCADE
);

CREATE TABLE estaPiezas (
    idJugador INT,
    numO INT,
    numI INT,
    numL INT,
    numZ INT,
    numJ INT,
    numS INT,
    numT INT,
    numP INT,
    numX INT,
    numU INT,
    numLv2 INT,
    numW INT,
    numTv2 INT,
    numZv2 INT,
    numXv2 INT,
    numLv3 INT,
    numF INT,
    numOv2 INT,
    numSv2 INT,
    numB INT,
    numY INT,
    numK INT,
    numIv2 INT,
    numC INT,
    numOv3 INT,
    numV INT,
    numH INT,
    numIv3 INT,
    numYv2 INT,
    numOv4 INT,
    numJv2 INT,
    numA INT,
    numMiniI INT,
    numMiniIv2 INT,
    numMiniL INT,
    numMiniO INT,
    numOv5 INT,
    numOv6 INT,
    numXv3 INT,
    numE INT,
    numTwinO INT,
    numTwinY INT,
    numPickAxe INT,
    numSv3 INT,
    numTwinOv2 INT,
    numZv3 INT,
    numLadder INT,
    numHv2 INT,

    total INT,
    PRIMARY KEY (idJugador),
    FOREIGN KEY (idJugador) REFERENCES jugador(id) ON DELETE CASCADE
);

CREATE TABLE mundo (
   idMundo INT,
   idJugador INT,
   completado BOOLEAN NOT NULL,
   desbloqueado BOOLEAN NOT NULL,
   PRIMARY KEY (idMundo, idJugador),
   FOREIGN KEY (idJugador) REFERENCES jugador(id) ON DELETE CASCADE
);

CREATE TABLE nivel (
   idNivel INT,
   idMundo INT,
   nombre VARCHAR(30),
   arrayPiezas VARCHAR(255),
   tiempoCaidaInicial INT,
   lienasParaAumentar INT,
   saltoDeTiempoPorLineas INT,
   limiteRotacionesB BOOLEAN,
   limiteRotacionesNum INT,
   holdActivado BOOLEAN,
   tablero INT,
   siguientesDisponibles INT,
   tipoTablero INT,
   dash BOOLEAN,
   puntuacionObj INT,
   tiempoObj VARCHAR(9),
   lineasObj INT,
   numFases INT,
   imagen VARCHAR(255),
   PRIMARY KEY (idNivel),
   FOREIGN KEY (idMundo) REFERENCES mundo(idMundo) ON DELETE CASCADE,
);

CREATE TABLE nivel_jugador (
   idNivel INT,
   idJugador INT,
   mejorTiempo VARCHAR(10),
   mejorPuntuacion INT,
   mejorLineas INT,
   completado BOOLEAN NOT NULL,
   desbloqueado BOOLEAN NOT NULL,
   numIntentos INT,
   PRIMARY KEY (idNivel, idJugador),
   FOREIGN KEY (idJugador) REFERENCES jugador(id) ON DELETE CASCADE,
   FOREIGN KEY (idNivel) REFERENCES nivel(idNivel) ON DELETE CASCADE,
);

CREATE TABLE modos_juego(
    idJugador INT,
    idNumModo INT,
    nombre VARCHAR(255),
    arrayPiezas VARCHAR(255),
    tablero VARCHAR(20),
    tipoPieza INT,
    tipoTableroSecun INT,
    tipoTableroPrincipal INT,
    tiempoCaidaInicial INT,
    lineasParaSaltoNivel INT,
    saltoDeTiempoPorNivel INT,
    limiteRotaciones INT,
    hold INT,
    piezas INT,
    dashes INT,
    PRIMARY KEY (idJugador, idNumModo),
    FOREIGN KEY (idJugador) REFERENCES jugador(id) ON DELETE CASCADE
);

CREATE TABLE logros (
    idLogro INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL
);

CREATE TABLE logro_jugador (
   idJugador INT,
   idLogro INT,
   PRIMARY KEY (idJugador, idLogro),
   FOREIGN KEY (idJugador) REFERENCES jugador(id) ON DELETE CASCADE,
   FOREIGN KEY (idLogro) REFERENCES logros(idLogro) ON DELETE CASCADE
);

INSERT INTO suscripcion (tipo, nombre, precio, numModos, numPartidasGuardadas, imagen)
VALUES (1, 'Plan básico', '1.99€', 3, 3, "/public/uploads/images/estrellas1de3.jpg");

INSERT INTO suscripcion (tipo, nombre, precio, numModos, numPartidasGuardadas, imagen)
VALUES (2, 'Plan Fit me', '4.99€', 6, 6,"/public/uploads/images/estrellas2de3.jpg");

INSERT INTO suscripcion (tipo, nombre, precio, numModos, numPartidasGuardadas, imagen)
VALUES (3, 'Plan Ultra Mega GOD', '6.99€', 9, 9,"/public/uploads/images/estrellas3de3.jpg");
