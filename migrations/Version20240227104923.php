<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240227104923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ajouter DROP FOREIGN KEY FK_AB384B5F33B63F32');
        $this->addSql('ALTER TABLE ajouter DROP FOREIGN KEY FK_AB384B5F41CD9E7A');
        $this->addSql('DROP INDEX IDX_AB384B5F41CD9E7A ON ajouter');
        $this->addSql('DROP INDEX IDX_AB384B5F33B63F32 ON ajouter');
        $this->addSql('ALTER TABLE ajouter DROP siret_id, DROP employer_id');
        $this->addSql('ALTER TABLE animal DROP race');
        $this->addSql('ALTER TABLE race DROP FOREIGN KEY FK_DA6FBBAFC54C8C93');
        $this->addSql('DROP INDEX IDX_DA6FBBAFC54C8C93 ON race');
        $this->addSql('ALTER TABLE race DROP type_id');
        $this->addSql('ALTER TABLE societe DROP FOREIGN KEY FK_19653DBD3A2E8246');
        $this->addSql('DROP INDEX IDX_19653DBD3A2E8246 ON societe');
        $this->addSql('ALTER TABLE societe DROP ajouter_id');
        $this->addSql('ALTER TABLE soigner DROP FOREIGN KEY FK_6F551B198E962C16');
        $this->addSql('ALTER TABLE soigner DROP FOREIGN KEY FK_6F551B196B899279');
        $this->addSql('DROP INDEX IDX_6F551B196B899279 ON soigner');
        $this->addSql('DROP INDEX IDX_6F551B198E962C16 ON soigner');
        $this->addSql('ALTER TABLE soigner DROP animal_id, DROP patient_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ajouter ADD siret_id INT DEFAULT NULL, ADD employer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ajouter ADD CONSTRAINT FK_AB384B5F33B63F32 FOREIGN KEY (siret_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE ajouter ADD CONSTRAINT FK_AB384B5F41CD9E7A FOREIGN KEY (employer_id) REFERENCES employer (id)');
        $this->addSql('CREATE INDEX IDX_AB384B5F41CD9E7A ON ajouter (employer_id)');
        $this->addSql('CREATE INDEX IDX_AB384B5F33B63F32 ON ajouter (siret_id)');
        $this->addSql('ALTER TABLE animal ADD race VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE race ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE race ADD CONSTRAINT FK_DA6FBBAFC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_DA6FBBAFC54C8C93 ON race (type_id)');
        $this->addSql('ALTER TABLE societe ADD ajouter_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBD3A2E8246 FOREIGN KEY (ajouter_id) REFERENCES ajouter (id)');
        $this->addSql('CREATE INDEX IDX_19653DBD3A2E8246 ON societe (ajouter_id)');
        $this->addSql('ALTER TABLE soigner ADD animal_id INT NOT NULL, ADD patient_id INT NOT NULL');
        $this->addSql('ALTER TABLE soigner ADD CONSTRAINT FK_6F551B198E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE soigner ADD CONSTRAINT FK_6F551B196B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('CREATE INDEX IDX_6F551B196B899279 ON soigner (patient_id)');
        $this->addSql('CREATE INDEX IDX_6F551B198E962C16 ON soigner (animal_id)');
    }
}
