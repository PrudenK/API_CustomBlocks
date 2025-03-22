<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250322091002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nivel_jugador (mejor_tiempo VARCHAR(10) DEFAULT NULL, mejor_puntuacion INT DEFAULT NULL, mejor_lineas INT DEFAULT NULL, completado TINYINT(1) NOT NULL, desbloqueado TINYINT(1) NOT NULL, num_intentos INT DEFAULT NULL, idNivel INT NOT NULL, idJugador INT NOT NULL, INDEX IDX_9683B2CDBD3863D6 (idNivel), INDEX IDX_9683B2CD42C404EA (idJugador), PRIMARY KEY(idNivel, idJugador)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nivel_jugador ADD CONSTRAINT FK_9683B2CDBD3863D6 FOREIGN KEY (idNivel) REFERENCES nivel (idNivel) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nivel_jugador ADD CONSTRAINT FK_9683B2CD42C404EA FOREIGN KEY (idJugador) REFERENCES jugador (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nivel_jugador DROP FOREIGN KEY FK_9683B2CDBD3863D6');
        $this->addSql('ALTER TABLE nivel_jugador DROP FOREIGN KEY FK_9683B2CD42C404EA');
        $this->addSql('DROP TABLE nivel_jugador');
    }
}
