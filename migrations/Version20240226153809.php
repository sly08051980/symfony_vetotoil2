<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240226153809 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soigner ADD patient_id INT NOT NULL');
        $this->addSql('ALTER TABLE soigner ADD CONSTRAINT FK_6F551B196B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('CREATE INDEX IDX_6F551B196B899279 ON soigner (patient_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soigner DROP FOREIGN KEY FK_6F551B196B899279');
        $this->addSql('DROP INDEX IDX_6F551B196B899279 ON soigner');
        $this->addSql('ALTER TABLE soigner DROP patient_id');
    }
}
