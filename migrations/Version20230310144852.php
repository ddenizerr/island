<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230310144852 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE maintenance DROP FOREIGN KEY FK_2F84F8E9714819A0');
        $this->addSql('DROP INDEX IDX_2F84F8E9714819A0 ON maintenance');
        $this->addSql('ALTER TABLE maintenance CHANGE type_id_id type_id INT NOT NULL');
        $this->addSql('ALTER TABLE maintenance ADD CONSTRAINT FK_2F84F8E9C54C8C93 FOREIGN KEY (type_id) REFERENCES maintenance_type (id)');
        $this->addSql('CREATE INDEX IDX_2F84F8E9C54C8C93 ON maintenance (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE maintenance DROP FOREIGN KEY FK_2F84F8E9C54C8C93');
        $this->addSql('DROP INDEX IDX_2F84F8E9C54C8C93 ON maintenance');
        $this->addSql('ALTER TABLE maintenance CHANGE type_id type_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE maintenance ADD CONSTRAINT FK_2F84F8E9714819A0 FOREIGN KEY (type_id_id) REFERENCES maintenance_type (id)');
        $this->addSql('CREATE INDEX IDX_2F84F8E9714819A0 ON maintenance (type_id_id)');
    }
}
