<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250407115618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE partida_pvp (id INT AUTO_INCREMENT NOT NULL, host INT NOT NULL, visitante INT NOT NULL, modo VARCHAR(50) DEFAULT NULL, resultado VARCHAR(50) DEFAULT NULL, fecha DATETIME NOT NULL, INDEX IDX_9A293A07CF2713FD (host), INDEX IDX_9A293A07E3659823 (visitante), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE partida_pvp ADD CONSTRAINT FK_9A293A07CF2713FD FOREIGN KEY (host) REFERENCES jugador (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE partida_pvp ADD CONSTRAINT FK_9A293A07E3659823 FOREIGN KEY (visitante) REFERENCES jugador (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partida_pvp DROP FOREIGN KEY FK_9A293A07CF2713FD');
        $this->addSql('ALTER TABLE partida_pvp DROP FOREIGN KEY FK_9A293A07E3659823');
        $this->addSql('DROP TABLE partida_pvp');
    }
}
