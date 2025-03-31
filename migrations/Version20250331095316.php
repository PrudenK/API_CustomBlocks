<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250331095316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE partida_guardada (id INT AUTO_INCREMENT NOT NULL, num_partida_guardada INT NOT NULL, modo VARCHAR(20) NOT NULL, tiempo VARCHAR(20) NOT NULL, puntuacion INT NOT NULL, lineas INT NOT NULL, nivel INT NOT NULL, tablero_partida JSON NOT NULL, tama_tablero INT NOT NULL, dise_tablero INT NOT NULL, dise_tablero_secun INT NOT NULL, siguientes_piezas_activo INT NOT NULL, siguientes_piezas VARCHAR(255) NOT NULL, array_piezas VARCHAR(255) NOT NULL, dise_piezas INT NOT NULL, hold_activo INT NOT NULL, dash_activo INT NOT NULL, velocidad_caida_actual INT NOT NULL, lineas_para_salto_de_nivel INT NOT NULL, salto_de_tiempo_por_nivel INT NOT NULL, limite_rotaciones INT NOT NULL, pieza_actual VARCHAR(50) NOT NULL, posicion_pieza_actual VARCHAR(100) NOT NULL, num_rotaciones_de_la_pieza_actual INT NOT NULL, idJugador INT NOT NULL, INDEX idJugador (idJugador), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE partida_guardada ADD CONSTRAINT FK_9DDD522742C404EA FOREIGN KEY (idJugador) REFERENCES jugador (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partida_guardada DROP FOREIGN KEY FK_9DDD522742C404EA');
        $this->addSql('DROP TABLE partida_guardada');
    }
}
