<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250322094951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mundo_jugador (completado TINYINT(1) NOT NULL, desbloqueado TINYINT(1) NOT NULL, idMundo INT NOT NULL, idJugador INT NOT NULL, INDEX IDX_E0210C0B72706312 (idMundo), INDEX IDX_E0210C0B42C404EA (idJugador), PRIMARY KEY(idMundo, idJugador)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mundo_jugador ADD CONSTRAINT FK_E0210C0B72706312 FOREIGN KEY (idMundo) REFERENCES mundo (idMundo) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mundo_jugador ADD CONSTRAINT FK_E0210C0B42C404EA FOREIGN KEY (idJugador) REFERENCES jugador (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mundo_jugador DROP FOREIGN KEY FK_E0210C0B72706312');
        $this->addSql('ALTER TABLE mundo_jugador DROP FOREIGN KEY FK_E0210C0B42C404EA');
        $this->addSql('DROP TABLE mundo_jugador');
    }
}
