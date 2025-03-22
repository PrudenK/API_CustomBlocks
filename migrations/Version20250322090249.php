<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250322090249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nivel DROP FOREIGN KEY FK_AAFC20CB42C404EA');
        $this->addSql('ALTER TABLE nivel DROP FOREIGN KEY FK_AAFC20CB7270631242C404EA');
        $this->addSql('DROP INDEX IDX_AAFC20CB7270631242C404EA ON nivel');
        $this->addSql('DROP INDEX idJugador ON nivel');
        $this->addSql('DROP INDEX `primary` ON nivel');
        $this->addSql('ALTER TABLE nivel ADD nombre VARCHAR(30) DEFAULT NULL, ADD arrayPiezas VARCHAR(255) DEFAULT NULL, ADD tiempoCaidaInicial INT DEFAULT NULL, ADD lienasParaAumentar INT DEFAULT NULL, ADD saltoDeTiempoPorLineas INT DEFAULT NULL, ADD limiteRotacionesB TINYINT(1) NOT NULL, ADD limiteRotacionesNum INT DEFAULT NULL, ADD holdActivado TINYINT(1) NOT NULL, ADD tablero INT DEFAULT NULL, ADD siguientesDisponibles INT DEFAULT NULL, ADD tipoTablero INT DEFAULT NULL, ADD dash TINYINT(1) NOT NULL, ADD numFases INT DEFAULT NULL, DROP mejorTiempo, DROP mejorPuntuacion, DROP mejorLineas, DROP completado, DROP desbloqueado, DROP idJugador, CHANGE tiempoObj tiempoObj VARCHAR(9) DEFAULT NULL');
        $this->addSql('ALTER TABLE nivel ADD CONSTRAINT FK_AAFC20CB72706312 FOREIGN KEY (idMundo) REFERENCES mundo (idMundo) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nivel ADD PRIMARY KEY (idNivel)');
        $this->addSql('ALTER TABLE nivel RENAME INDEX idmundo TO IDX_AAFC20CB72706312');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nivel DROP FOREIGN KEY FK_AAFC20CB72706312');
        $this->addSql('DROP INDEX `PRIMARY` ON nivel');
        $this->addSql('ALTER TABLE nivel ADD mejorTiempo VARCHAR(10) DEFAULT NULL, ADD mejorPuntuacion INT DEFAULT NULL, ADD mejorLineas INT DEFAULT NULL, ADD completado TINYINT(1) NOT NULL, ADD desbloqueado TINYINT(1) NOT NULL, ADD idJugador INT NOT NULL, DROP nombre, DROP arrayPiezas, DROP tiempoCaidaInicial, DROP lienasParaAumentar, DROP saltoDeTiempoPorLineas, DROP limiteRotacionesB, DROP limiteRotacionesNum, DROP holdActivado, DROP tablero, DROP siguientesDisponibles, DROP tipoTablero, DROP dash, DROP numFases, CHANGE tiempoObj tiempoObj VARCHAR(8) DEFAULT NULL');
        $this->addSql('ALTER TABLE nivel ADD CONSTRAINT FK_AAFC20CB42C404EA FOREIGN KEY (idJugador) REFERENCES jugador (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nivel ADD CONSTRAINT FK_AAFC20CB7270631242C404EA FOREIGN KEY (idMundo, idJugador) REFERENCES mundo (idMundo, idJugador) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_AAFC20CB7270631242C404EA ON nivel (idMundo, idJugador)');
        $this->addSql('CREATE INDEX idJugador ON nivel (idJugador)');
        $this->addSql('ALTER TABLE nivel ADD PRIMARY KEY (idNivel, idJugador)');
        $this->addSql('ALTER TABLE nivel RENAME INDEX idx_aafc20cb72706312 TO idMundo');
    }
}
