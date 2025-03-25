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
    online BOOLEAN,
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
   imagen VARCHAR(255),
   PRIMARY KEY (idMundo)
);

CREATE TABLE mundo_jugador (
   idMundo INT,
   idJugador INT,
   completado BOOLEAN NOT NULL,
   desbloqueado BOOLEAN NOT NULL,
   PRIMARY KEY (idMundo, idJugador),
   FOREIGN KEY (idJugador) REFERENCES jugador(id) ON DELETE CASCADE,
   FOREIGN KEY (idMundo) REFERENCES mundo(idMundo) ON DELETE CASCADE
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
   FOREIGN KEY (idMundo) REFERENCES mundo(idMundo) ON DELETE CASCADE
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
   FOREIGN KEY (idNivel) REFERENCES nivel(idNivel) ON DELETE CASCADE
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
    descripcion TEXT NOT NULL,
    imagen VARCHAR(255),
    posicion INT
);

CREATE TABLE logro_jugador (
   idJugador INT,
   idLogro INT,
   PRIMARY KEY (idJugador, idLogro),
   FOREIGN KEY (idJugador) REFERENCES jugador(id) ON DELETE CASCADE,
   FOREIGN KEY (idLogro) REFERENCES logros(idLogro) ON DELETE CASCADE
);

DELETE FROM suscripcion;

INSERT INTO suscripcion (tipo, nombre, precio, numModos, numPartidasGuardadas, imagen)
VALUES
    (1, 'Plan básico', '1.99€', 3, 3, "/uploads/images/estrellas1de3.jpg"),
    (2, 'Plan Fit me', '4.99€', 6, 6,"/uploads/images/estrellas2de3.jpg"),
    (3, 'Plan Ultra Mega GOD', '6.99€', 9, 9,"/uploads/images/estrellas3de3.jpg");


INSERT INTO mundo (idMundo, imagen)
VALUES
    (1, "/uploads/mund1/Mundo1.jpg"),
    (2, "/uploads/mund2/Mundo2.jpg"),
    (3, "/uploads/mund3/Mundo3.jpg"),
    (4, "/uploads/mund4/Mundo4.jpg"),
    (5, "/uploads/mund5/Mundo5.jpg"),
    (6, "/uploads/mund6/Mundo6.jpg"),
    (7, "/uploads/mund7/Mundo7.jpg"),
    (8, "/uploads/mund8/Mundo8.jpg"),
    (9, "/uploads/mund9/Mundo9.jpg");



INSERT INTO nivel (idNivel, idMundo, nombre, arrayPiezas, tiempoCaidaInicial, lienasParaAumentar,
                   saltoDeTiempoPorLineas, limiteRotacionesB, limiteRotacionesNum, holdActivado, tablero,
                   siguientesDisponibles, tipoTablero, dash, puntuacionObj, tiempoObj, lineasObj, numFases, imagen)
VALUES
    (1,1, "Mundo 1, Nivel 1", "0_1_2_3_4_5_6", 1500, 2,   100, false, -1, true, 1, true, 1, false, 4000, "/0:04:00", 20, 10, "/uploads/mund1/Nivel_1_1.jpg"),
    (2, 1, "Mundo 1, Nivel 2", "0_1_2_3_4_5_6", 1400, 2,  100, false, -1, true, 1, true, 1, false, 5000, "/0:03:30", 20, 10, "/uploads/mund1/Nivel_1_2.jpg"),
    (3, 1, "Mundo 1, Nivel 3", "0_1_2_3_4_5_6", 1200, 3, 100, false, -1, true, 1, true, 1, false, 6500, "/0:03:00", 24, 8, "/uploads/mund1/Nivel_1_3.jpg"),
    (4, 1, "Mundo 1, Nivel 4", "0_1_2_3_4_5_6", 1300, 3, 100, false, -1, true, 0, true, 1, false, 4000, "/0:02:00", 18, 6, "/uploads/mund1/Nivel_1_4.jpg"),
    (5, 1, "Mundo 1, Nivel 5", "0_1_2_3_4_5_6", 1200, 5, 100, false, -1, true, 0, true, 1, false, 5000, "/0:03:00", 25, 5, "/uploads/mund1/Nivel_1_5.jpg"),
    (6, 1, "Mundo 1, Nivel 6", "0_1_2_3_4_5_6", 1200, 3, 100, false, -1, true, 0, true, 2, false, 2000, "/0:03:00", 15, 5, "/uploads/mund1/Nivel_1_6.jpg"),
    (7, 1, "Mundo 1, Nivel 7", "0_1_2_3_4_5_6", 1200, 4, 100, false, -1, true, 2, true, 1, true, 8000, "/0:04:00", 16, 4, "/uploads/mund1/Nivel_1_7.jpg"),
    (8, 1, "Mundo 1, Nivel 8", "0_1_2_3_4_5_6", 1300, 1, 100, false, -1, true, 2, true, 0, true, 5000, "/0:03:30", 10, 10, "/uploads/mund1/Nivel_1_8.jpg"),
    (9, 1, "Mundo 1, Nivel 9", "0_1_17_22_27", 1500, 4, 100, false, -1, true, 2, true, 1, true, 12000, "/0:04:30", 24, 6, "/uploads/mund1/Nivel_1_9.jpg"),
    (10, 2, "Mundo 2, Nivel 1", "1_2_4_10_23_27", 1500, 2, 100, false, -1, true, 1, true, 1, false, 4000, "/0:04:00", 20, 10, "/uploads/mund2/Nivel_2_1.jpg"),
    (11, 2, "Mundo 2, Nivel 2", "1_2_4_10_23_27", 900, 4, 100, false, -1, true, 1, true, 1, false, 3000, "/0:02:00", 16, 4, "/uploads/mund2/Nivel_2_2.jpg"),
    (12, 2, "Mundo 2, Nivel 3", "1_2_4_10_27", 1200, 5, 300, false, -1, true, 1, true, 3, false, 2000, "/0:02:00", 10, 2, "/uploads/mund2/Nivel_2_3.jpg"),
    (13, 2, "Mundo 2, Nivel 4", "1_2_4_10_27", 800, 5, 100, false, -1, true, 0, true, 1, false, 3000, "/0:01:30", 20, 4, "/uploads/mund2/Nivel_2_4.jpg"),
    (14, 2, "Mundo 2, Nivel 5", "1_2_4_10_23_27", 1300, 5, 100, false, -1, true, 0, true, 1, false, 4000, "/0:02:00", 20, 4, "/uploads/mund2/Nivel_2_5.jpg"),
    (15, 2, "Mundo 2, Nivel 6", "1_2_4_10_23_27", 1600, 4, 100, true, 4, true, 0, true, 1, false, 6000, "/0:03:00", 24, 6, "/uploads/mund2/Nivel_2_6.jpg"),
    (16, 2, "Mundo 2, Nivel 7", "1_2_4_10_23_27", 900, 1, 100, false, -1, true, 2, true, 1, true, 0, "/0:01:15", 4, 4, "/uploads/mund2/Nivel_2_7.jpg"),
    (17, 2, "Mundo 2, Nivel 8", "1_2_4_10_23_27", 1200, 2, 100, false, -1, true, 2, true, 1, true, 8000, "/0:05:00", 16, 8, "/uploads/mund2/Nivel_2_8.jpg"),
    (18, 2, "Mundo 2, Nivel 9", "1_2_4_10_23_27", 400, 1, 50, false, -1, true, 2, true, 1, true, 2500, "/0:02:30", 6, 6, "/uploads/mund2/Nivel_2_9.jpg"),
    (19, 3, "Mundo 3, Nivel 1", "1_6_7_9_16_19_24", 1500, 2, 100, false, -1, true, 1, true, 1, false, 4000, "/0:04:00", 20, 10, "/uploads/mund3/Nivel_3_1.jpg"),
    (20, 3, "Mundo 3, Nivel 2", "1_6_7_9_16_19_24", 1000, 4, 100, false, -1, true, 1, false, 1, false, 3300, "/0:03:00", 16, 4, "/uploads/mund3/Nivel_3_2.jpg"),
    (21, 3, "Mundo 3, Nivel 3", "1_6_7_9_16_19_24", 200, 7, 100, false, -1, true, 1, true, 1, true, 1000, "/0:01:00", 7, 1, "/uploads/mund3/Nivel_3_3.jpg"),
    (22, 3, "Mundo 3, Nivel 4", "1_6_7_9_16_19_24", 800, 3, 100, false, -1, true, 0, true, 1, false, 2500, "/0:02:00", 15, 5, "/uploads/mund3/Nivel_3_4.jpg"),
    (23, 3, "Mundo 3, Nivel 5", "1_6_7_9_16_19_24", 1200, 4, 100, false, -1, true, 0, false, 2, false, 2300, "/0:02:30", 16, 4, "/uploads/mund3/Nivel_3_5.jpg"),
    (24, 3, "Mundo 3, Nivel 6", "1_6_7_9_19", 1200, 2, 100, false, -1, true, 0, true, 4, false, 1000, "/0:02:00", 8, 4, "/uploads/mund3/Nivel_3_6.jpg"),
    (25, 3, "Mundo 3, Nivel 7", "1_6_7_9_16_19_24", 900, 1, 100, false, -1, true, 2, true, 1, true, 2500, "/0:01:30", 5, 5, "/uploads/mund3/Nivel_3_7.jpg"),
    (26, 3, "Mundo 3, Nivel 8", "1_6_7_9_16_19_24", 400, 1, 100, false, -1, true, 2, true, 1, true, 0, "/0:00:30", 2, 2, "/uploads/mund3/Nivel_3_8.jpg"),
    (27, 3, "Mundo 3, Nivel 9", "1_6_7_9_16_19_24", 700, 4, 100, true, 4, true, 2, true, 1, true, 9000, "/0:06:00", 20, 5, "/uploads/mund3/Nivel_3_9.jpg"),
    (28, 4, "Mundo 4, Nivel 1", "2_4_6_12_22_27_30_31", 1200, 2, 100, false, -1, true, 1, true, 1, false, 5500, "/0:03:00", 20, 10, "/uploads/mund4/Nivel_4_1.jpg"),
    (29, 4, "Mundo 4, Nivel 2", "2_4_6_12_22_27_30_31", 600, 1, 100, false, -1, true, 1, true, 1, false, 1500, "/0:00:40", 4, 4, "/uploads/mund4/Nivel_4_2.jpg"),
    (30, 4, "Mundo 4, Nivel 3", "2_4_6_12_22_27_30_31", 1100, 1, 100, false, -1, true, 1, true, 2, false, 2000, "/0:02:00", 10, 10, "/uploads/mund4/Nivel_4_3.jpg"),
    (31, 4, "Mundo 4, Nivel 4", "2_4_6_12_22_27_31", 1000, 5, 100, false, -1, true, 2, true, 1, true, 10000, "/0:05:00", 20, 4, "/uploads/mund4/Nivel_4_4.jpg"),
    (32, 4, "Mundo 4, Nivel 5", "2_4_6_12_22_27_31", 100, 2, 100, false, -1, true, 2, true, 1, true, 0, "/0:00:30", 2, 1, "/uploads/mund4/Nivel_4_5.jpg"),
    (33, 4, "Mundo 4, Nivel 6", "2_4_6_12_22_27_30_31", 1200, 1, 100, false, -1, true, 2, true, 1, true, 5000, "/0:03:00", 10, 10, "/uploads/mund4/Nivel_4_6.jpg"),
    (34, 4, "Mundo 4, Nivel 7", "2_4_6_12_22_27", 1200, 2, 100, false, -1, true, 0, true, 4, false, 1500, "/0:02:00", 10, 5, "/uploads/mund4/Nivel_4_7.jpg"),
    (35, 4, "Mundo 4, Nivel 8", "2_4_6_12_22_27_30_31", 1300, 3, 100, false, -1, true, 0, true, 1, false, 5000, "/0:05:00", 30, 10, "/uploads/mund4/Nivel_4_8.jpg"),
    (36, 4, "Mundo 4, Nivel 9", "2_4_6_12_22_27", 1000, 3, 100, false, -1, true, 0, true, 1, true, 2500, "/0:01:00", 18, 6, "/uploads/mund4/Nivel_4_9.jpg"),
    (37, 5, "Mundo 5, Nivel 1", "2_4_6_11_15_27_28", 1200, 2, 100, false, -1, true, 1, true, 1, false, 4000, "/0:04:00", 20, 10, "/uploads/mund5/Nivel_5_1.jpg"),
    (38, 5, "Mundo 5, Nivel 2", "2_4_6_11_15_27_28", 500, 5, 100, false, -1, true, 1, true, 1, true, 1000, "/0:00:45", 5, 1, "/uploads/mund5/Nivel_5_2.jpg"),
    (39, 5, "Mundo 5, Nivel 3", "2_4_6_11_15_27_28", 1000, 3, 300, true, 4, true, 1, true, 1, false, 2500, "/0:02:00", 9, 3, "/uploads/mund5/Nivel_5_3.jpg"),
    (40, 5, "Mundo 5, Nivel 4", "2_4_6_11_15_27_28_34_35", 1200, 2, 150, false, -1, true, 0, true, 1, false, 2500, "/0:03:00", 14, 7, "/uploads/mund5/Nivel_5_4.jpg"),
    (41, 5, "Mundo 5, Nivel 5", "2_4_6_27_28_34_35_36_37", 1100, 2, 150, false, -1, true, 2, true, 1, true, 3500, "/0:03:00", 12, 6, "/uploads/mund5/Nivel_5_5.jpg"),
    (42, 5, "Mundo 5, Nivel 6", "2_4_6_27_34_35_36", 1500, 1, 100, false, -1, true, 0, false, 2, false, 2500, "/0:01:30", 12, 12, "/uploads/mund5/Nivel_5_6.jpg"),
    (43, 5, "Mundo 5, Nivel 7", "2_4_6_27_34_35_36", 250, 10, 100, false, -1, true, 0, true, 2, true, 1200, "/0:01:00", 10, 1, "/uploads/mund5/Nivel_5_7.jpg"),
    (44, 5, "Mundo 5, Nivel 8", "2_4_6_27_34_35_36", 1500, 2, 100, false, -1, true, 0, true, 3, false, 1800, "/0:01:30", 12, 6, "/uploads/mund5/Nivel_5_8.jpg"),
    (45, 5, "Mundo 5, Nivel 9", "2_4_6_27_28_34_35_36_37", 400, 1, 50, false, -1, true, 2, true, 1, true, 2700, "/0:01:45", 5, 5, "/uploads/mund5/Nivel_5_9.jpg"),
    (46, 6, "Mundo 6, Nivel 1", "4_6_9_22_32_33_34_35", 500, 3, 50, false, -1, true, 0, true, 1, false, 3000, "/0:01:30", 15, 5, "/uploads/mund6/Nivel_6_1.jpg"),
    (47, 6, "Mundo 6, Nivel 2", "4_6_9_22_32_33_34_35", 800, 3, 100, true, 3, false, 0, false, 1, false, 3000, "/0:01:30", 18, 6, "/uploads/mund6/Nivel_6_2.jpg"),
    (48, 6, "Mundo 6, Nivel 3", "4_6_9_22_32_33_34_35", 150, 10, 50, false, -1, true, 0, true, 1, true, 1000, "/0:00:45", 10, 1, "/uploads/mund6/Nivel_6_3.jpg"),
    (49, 6, "Mundo 6, Nivel 4", "4_6_9_22_32_33_34_35", 800, 3, 100, false, -1, true, 0, true, 3, false, 2200, "/0:02:00", 12, 4, "/uploads/mund6/Nivel_6_4.jpg"),
    (50, 6, "Mundo 6, Nivel 5", "4_6_9_22_32_33_34_35", 700, 3, 100, false, -1, true, 0, true, 4, false, 2200, "/0:03:00", 12, 4, "/uploads/mund6/Nivel_6_5.jpg"),
    (51, 6, "Mundo 6, Nivel 6", "4_6_9_22_32_33_34_35_39", 600, 3, 100, false, -1, true, 1, true, 1, false, 2700, "/0:02:15", 15, 5, "/uploads/mund6/Nivel_6_6.jpg"),
    (52, 6, "Mundo 6, Nivel 7", "2_4_6_9_22_26_32_33_34_35_39", 300, 5, 50, false, -1, true, 1, true, 1, true, 2000, "/0:01:30", 10, 2, "/uploads/mund6/Nivel_6_7.jpg"),
    (53, 6, "Mundo 6, Nivel 8", "2_4_6_9_22_32_33_34_35_39", 500, 4, 50, false, -1, true, 1, true, 2, true, 2000, "/0:02:30", 12, 3, "/uploads/mund6/Nivel_6_8.jpg"),
    (54, 6, "Mundo 6, Nivel 9", "2_4_6_9_22_23_27_32_33_34_35", 300, 4, 50, false, -1, true, 2, true, 1, true, 7000, "/0:06:30", 16, 4, "/uploads/mund6/Nivel_6_9.jpg"),
    (55, 7, "Mundo 7, Nivel 1", "0_1_17_36_37", 100, 10, 50, false, -1, true, 2, true, 1, true, 3000, "/0:01:20", 10, 1, "/uploads/mund7/Nivel_7_1.jpg"),
    (56, 7, "Mundo 7, Nivel 2", "0_1_17_36_37", 250, 10, 50, false, -1, true, 1, true, 1, true, 6000, "/0:01:00", 30, 3, "/uploads/mund7/Nivel_7_2.jpg"),
    (57, 7, "Mundo 7, Nivel 3", "0_1_17_36_37", 300, 20, 50, false, -1, true, 0, true, 1, true, 3000, "/0:00:45", 20, 1, "/uploads/mund7/Nivel_7_3.jpg"),
    (58, 7, "Mundo 7, Nivel 4", "0_1_17_36_37", 250, 60, 50, false, -1, true, 0, true, 1, true, 8000, "/0:02:00", 60, 1, "/uploads/mund7/Nivel_7_4.jpg"),
    (59, 7, "Mundo 7, Nivel 5", "0_1_17_27_36_37_40", 300, 10, 50, false, -1, true, 1, true, 1, true, 5000, "/0:02:00", 30, 3, "/uploads/mund7/Nivel_7_5.jpg"),
    (60, 7, "Mundo 7, Nivel 6", "0_1_17_27_36_37", 50, 2, 0, false, -1, true, 2, true, 1, true, 100, "/0:00:15", 2, 1, "/uploads/mund7/Nivel_7_6.jpg"),
    (61, 7, "Mundo 7, Nivel 7", "0_1_17_27_36_37", 300, 5, 50, false, -1, true, 0, true, 2, true, 3000, "/0:01:15", 20, 4, "/uploads/mund7/Nivel_7_7.jpg"),
    (62, 7, "Mundo 7, Nivel 8", "0_1_17_27_36_37", 300, 5, 50, false, -1, true, 1, true, 3, true, 3000, "/0:02:00", 20, 4, "/uploads/mund7/Nivel_7_8.jpg"),
    (63, 7, "Mundo 7, Nivel 9", "0_1_17_27_36_37", 200, 40, 0, false, -1, true, 2, true, 1, true, 12000, "/0:04:00", 40, 1, "/uploads/mund7/Nivel_7_9.jpg"),
    (64, 8, "Mundo 8, Nivel 1", "1_2_4_9_10_13_18_22_23_27_32", 400, 4, 50, false, -1, true, 1, true, 1, false, 4000, "/0:02:30", 20, 5, "/uploads/mund8/Nivel_8_1.jpg"),
    (65, 8, "Mundo 8, Nivel 2", "1_2_4_9_10_13_18_22_23_27_32", 500, 3, 50, false, -1, true, 1, true, 2, false, 3000, "/0:02:00", 15, 5, "/uploads/mund8/Nivel_8_2.jpg"),
    (66, 8, "Mundo 8, Nivel 3", "1_2_4_9_10_13_18_22_23_27_32", 500, 5, 250, false, -1, true, 0, true, 1, false, 1600, "/0:01:00", 10, 2, "/uploads/mund8/Nivel_8_3.jpg"),
    (67, 8, "Mundo 8, Nivel 4", "1_2_4_9_10_13_18_22_23_27_32", 800, 5, 100, true, 3, true, 0, true, 1, false, 2500, "/0:02:00", 15, 3, "/uploads/mund8/Nivel_8_4.jpg"),
    (68, 8, "Mundo 8, Nivel 5", "1_2_4_9_10_13_18_22_23_27_32", 500, 4, 100, false, -1, true, 1, true, 3, false, 2400, "/0:02:00", 12, 3, "/uploads/mund8/Nivel_8_5.jpg"),
    (69, 8, "Mundo 8, Nivel 6", "1_2_4_9_10_13_18_22_23_27_32", 500, 3, 100, false, -1, true, 1, true, 4, false, 1600, "/0:01:00", 9, 3, "/uploads/mund8/Nivel_8_6.jpg"),
    (70, 8, "Mundo 8, Nivel 7", "1_2_4_9_10_13_18_22_23_27_32", 300, 5, 50, false, -1, true, 2, true, 1, false, 2500, "/0:01:30", 5, 1, "/uploads/mund8/Nivel_8_7.jpg"),
    (71, 8, "Mundo 8, Nivel 8", "1_2_4_9_10_13_18_22_23_27_32", 100, 2, 50, false, -1, true, 2, true, 1, false, 0, "/0:00:25", 2, 1, "/uploads/mund8/Nivel_8_8.jpg"),
    (72, 8, "Mundo 8, Nivel 9", "1_2_4_9_10_13_18_22_23_27_32", 500, 3, 50, false, -1, true, 2, true, 1, true, 6000, "/0:05:00", 15, 5, "/uploads/mund8/Nivel_8_9.jpg"),
    (73, 9, "Mundo 9, Nivel 1", "0_1_13_18_32_37_43_45", 600, 1, 50, true, 3, true, 1, true, 1, false, 2500, "/0:02:00", 10, 10, "/uploads/mund9/Nivel_9_1.jpg"),
    (74, 9, "Mundo 9, Nivel 2", "22_47", 150, 6, 0, true, 3, true, 0, true, 1, true, 0, "/0:00:20", 6, 1, "/uploads/mund9/Nivel_9_2.jpg"),
    (75, 9, "Mundo 9, Nivel 3", "1_6_26_34_35", 250, 10, 0, true, 3, true, 1, true, 1, true, 2200, "/0:00:50", 10, 1, "/uploads/mund9/Nivel_9_3.jpg"),
    (76, 9, "Mundo 9, Nivel 4", "36_37", 50, 3, 0, false, -1, true, 2, true, 2, true, 0, "/0:00:10", 3, 1, "/uploads/mund9/Nivel_9_4.jpg"),
    (77, 9, "Mundo 9, Nivel 5", "6_16_25_31_32_35_39", 900, 1, 100, false, -1, true, 2, true, 1, true, 3500, "/0:05:00", 8, 8, "/uploads/mund9/Nivel_9_5.jpg"),
    (78, 9, "Mundo 9, Nivel 6", "0_40", 150, 50, 100, false, -1, true, 0, true, 1, true, 8000, "/0:01:00", 50, 1, "/uploads/mund9/Nivel_9_6.jpg"),
    (79, 9, "Mundo 9, Nivel 7", "1_10_11_15_32", 850, 4, 350, false, -1, true, 1, true, 1, false, 2500, "/0:02:00", 12, 3, "/uploads/mund9/Nivel_9_7.jpg"),
    (80, 9, "Mundo 9, Nivel 8", "6_26", 250, 6, 0, false, -1, true, 0, true, 1, true, 0, "/0:00:40", 6, 1, "/uploads/mund9/Nivel_9_8.jpg"),
    (81, 9, "Mundo 9, Nivel 9", "0_1_2_3_4_5_6", 150, 30, 0, true, 3, true, 1, true, 1, false, 6000, "/0:02:30", 30, 1, "/uploads/mund9/Nivel_9_9.jpg");

INSERT INTO logros (nombre, descripcion, imagen)
    VALUES
    ("¡Mundo 1!", "Completar el mundo 1", "/uploads/logros/Mundo1_apro.jpg"),
    ("¡Mundo 2!", "Completar el mundo 2", "/uploads/logros/Mundo2_apro.jpg"),
    ("¡Mundo 3!", "Completar el mundo 3", "/uploads/logros/Mundo3_apro.jpg"),
    ("¡Mundo 4!", "Completar el mundo 4", "/uploads/logros/Mundo4_apro.jpg"),
    ("¡Mundo 5!", "Completar el mundo 5", "/uploads/logros/Mundo5_apro.jpg"),
    ("¡Mundo 6!", "Completar el mundo 6", "/uploads/logros/Mundo6_apro.jpg"),
    ("¡Mundo 7!", "Completar el mundo 7", "/uploads/logros/Mundo7_apro.jpg"),
    ("¡Mundo 8!", "Completar el mundo 8", "/uploads/logros/Mundo8_apro.jpg"),
    ("¡Mundo 9!", "Completar el mundo 9", "/uploads/logros/Mundo9_apro.jpg"),
    ("Aficionado", "Juega 100 partidas en modo clásico", "/uploads/logros/100clasico.png"),
    ("Novato", "Juega 10 partidas en modo clásico", "/uploads/logros/10clasico.png"),
    ("Nain Nain Nain", "Con esta me cancelan...", "/uploads/logros/4519.png"),
    ("Maquinón", "Juego 500 partidas en modo clásico", "/uploads/logros/500clasico.png"),
    ("Par de puntos", "Consigue 100.000 puntos en partidas que no sean custom", "/uploads/logros/100Kpuntos.png"),
    ("Apuntando maneras", "Consigue 1.000.000 puntos en partidas que no sean custom", "/uploads/logros/1Mpuntos.png"),
    ("Por las nubes", "Consigue 10.000.000 puntos en partidas que no sean custom", "/uploads/logros/10Mpuntos.png"),
    ("Par de lineas", "Consigue 1.000 lineas en partidas que no sean custom", "/uploads/logros/1000Lineas.png"),
    ("Bastantes rayas", "Consigue 5.000 lineas en partidas que no sean custom", "/uploads/logros/5kLineas.png"),
    ("Maradona", "Consigue 10.000 lineas en partidas que no sean custom", "/uploads/logros/10kLineas.png"),
    ("¿Sueño?", "Zzz", "/uploads/logros/zzz.png"),
    ("Skillsss III", "Llega al nivel 15 en una partida clásica", "/uploads/logros/lv15.png"),
    ("Skillsss I", "Llega al nivel 5 en una partida clásica", "/uploads/logros/lv5.png"),
    ("Skillsss II", "Llega al nivel 10 en una partida clásica", "/uploads/logros/lv10.png"),
    ("Teclado en llamas", "Consgigue 40 lineas en menos de 3 minutos en una partida clásica", "/uploads/logros/tecladoEnLLamas.png"),