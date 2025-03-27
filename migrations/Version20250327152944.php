<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250327152944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mensaje_clan (idMensaje INT AUTO_INCREMENT NOT NULL, remitente VARCHAR(100) NOT NULL, mensaje LONGTEXT NOT NULL, fecha DATETIME NOT NULL, idClan INT NOT NULL, INDEX idClan (idClan), PRIMARY KEY(idMensaje)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mensaje_clan ADD CONSTRAINT FK_85E4534DEC0BFD92 FOREIGN KEY (idClan) REFERENCES clan (idClan) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mensaje_clan DROP FOREIGN KEY FK_85E4534DEC0BFD92');
        $this->addSql('DROP TABLE mensaje_clan');
    }
}
