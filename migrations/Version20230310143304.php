<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230310143304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F708A0E0');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FAFFE2D26');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FB2A1D860');
        $this->addSql('ALTER TABLE device DROP FOREIGN KEY FK_92FB68EC54C8C93');
        $this->addSql('ALTER TABLE donor DROP FOREIGN KEY FK_D7F24097714819A0');
        $this->addSql('ALTER TABLE habitat DROP FOREIGN KEY FK_3B37B2E864D218E');
        $this->addSql('ALTER TABLE maintanence DROP FOREIGN KEY FK_3B772DA8AFFE2D26');
        $this->addSql('ALTER TABLE maintanence DROP FOREIGN KEY FK_3B772DA8C54C8C93');
        $this->addSql('ALTER TABLE track DROP FOREIGN KEY FK_D6E3F8A65EB747A3');
        $this->addSql('ALTER TABLE track DROP FOREIGN KEY FK_D6E3F8A6B9C17E30');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE device');
        $this->addSql('DROP TABLE device_type');
        $this->addSql('DROP TABLE donation_type');
        $this->addSql('DROP TABLE donor');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE habitat');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE maintanence');
        $this->addSql('DROP TABLE maintanence_type');
        $this->addSql('DROP TABLE species');
        $this->addSql('DROP TABLE track');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, habitat_id INT NOT NULL, species_id INT NOT NULL, gender_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, weight INT DEFAULT NULL, INDEX IDX_6AAB231FAFFE2D26 (habitat_id), INDEX IDX_6AAB231FB2A1D860 (species_id), INDEX IDX_6AAB231F708A0E0 (gender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE device (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, last_updated DATETIME DEFAULT NULL, online TINYINT(1) DEFAULT NULL, INDEX IDX_92FB68EC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE device_type (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE donation_type (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE donor (id INT AUTO_INCREMENT NOT NULL, type_id_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, contact_info VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, donation_amount INT DEFAULT NULL, INDEX IDX_D7F24097714819A0 (type_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE habitat (id INT AUTO_INCREMENT NOT NULL, location_id INT NOT NULL, climate VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, vegetation NUMERIC(4, 2) DEFAULT NULL, INDEX IDX_3B37B2E864D218E (location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE maintanence (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, habitat_id INT NOT NULL, last_serviced DATETIME NOT NULL, INDEX IDX_3B772DA8AFFE2D26 (habitat_id), INDEX IDX_3B772DA8C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE maintanence_type (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE species (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE track (id INT AUTO_INCREMENT NOT NULL, animal_id_id INT NOT NULL, device_id_id INT NOT NULL, coordinate_lat NUMERIC(10, 10) NOT NULL, coordinate_lon NUMERIC(10, 10) NOT NULL, INDEX IDX_D6E3F8A65EB747A3 (animal_id_id), INDEX IDX_D6E3F8A6B9C17E30 (device_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FB2A1D860 FOREIGN KEY (species_id) REFERENCES species (id)');
        $this->addSql('ALTER TABLE device ADD CONSTRAINT FK_92FB68EC54C8C93 FOREIGN KEY (type_id) REFERENCES device_type (id)');
        $this->addSql('ALTER TABLE donor ADD CONSTRAINT FK_D7F24097714819A0 FOREIGN KEY (type_id_id) REFERENCES donation_type (id)');
        $this->addSql('ALTER TABLE habitat ADD CONSTRAINT FK_3B37B2E864D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE maintanence ADD CONSTRAINT FK_3B772DA8AFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)');
        $this->addSql('ALTER TABLE maintanence ADD CONSTRAINT FK_3B772DA8C54C8C93 FOREIGN KEY (type_id) REFERENCES maintanence_type (id)');
        $this->addSql('ALTER TABLE track ADD CONSTRAINT FK_D6E3F8A65EB747A3 FOREIGN KEY (animal_id_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE track ADD CONSTRAINT FK_D6E3F8A6B9C17E30 FOREIGN KEY (device_id_id) REFERENCES device (id)');
    }
}
