<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230310143945 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE donor (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, name LONGTEXT NOT NULL, contact_info INT DEFAULT NULL, donation_amount NUMERIC(10, 2) DEFAULT NULL, INDEX IDX_D7F24097C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE donor_type (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE donor ADD CONSTRAINT FK_D7F24097C54C8C93 FOREIGN KEY (type_id) REFERENCES donor_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donor DROP FOREIGN KEY FK_D7F24097C54C8C93');
        $this->addSql('DROP TABLE donor');
        $this->addSql('DROP TABLE donor_type');
    }
}
