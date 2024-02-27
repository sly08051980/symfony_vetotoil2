<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240227085013 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ajouter ADD siret_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ajouter ADD CONSTRAINT FK_AB384B5F33B63F32 FOREIGN KEY (siret_id) REFERENCES societe (id)');
        $this->addSql('CREATE INDEX IDX_AB384B5F33B63F32 ON ajouter (siret_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ajouter DROP FOREIGN KEY FK_AB384B5F33B63F32');
        $this->addSql('DROP INDEX IDX_AB384B5F33B63F32 ON ajouter');
        $this->addSql('ALTER TABLE ajouter DROP siret_id');
    }
}
