<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240227083521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ajouter (id INT AUTO_INCREMENT NOT NULL, jours_travailler VARCHAR(100) NOT NULL, date_entree_employer DATE NOT NULL, date_sortie_employer DATE DEFAULT NULL, date_jours_vacances DATE DEFAULT NULL, date_fin_vacances DATE DEFAULT NULL, droit_utilisateur VARCHAR(10) DEFAULT NULL, debut_repas TIME DEFAULT NULL, fin_repas TIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commune (id INT AUTO_INCREMENT NOT NULL, nom_commune VARCHAR(100) NOT NULL, code_postal VARCHAR(5) NOT NULL, latitude VARCHAR(50) NOT NULL, longitude VARCHAR(50) NOT NULL, nom_departement VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employer (id INT AUTO_INCREMENT NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom_employer VARCHAR(50) NOT NULL, prenom_employer VARCHAR(50) NOT NULL, adresse_employer VARCHAR(255) NOT NULL, complement_adresse_employer VARCHAR(255) DEFAULT NULL, code_postal_employer VARCHAR(5) NOT NULL, ville_employer VARCHAR(50) NOT NULL, telephone_employer VARCHAR(10) NOT NULL, email VARCHAR(100) NOT NULL, profession VARCHAR(20) NOT NULL, images_employer VARCHAR(255) DEFAULT NULL, date_creation_employer DATE NOT NULL, droit_utilisateur_employer VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rdv (id INT AUTO_INCREMENT NOT NULL, date_rdv DATE NOT NULL, heure TIME NOT NULL, status_rdv VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (id INT AUTO_INCREMENT NOT NULL, siret VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom_societe VARCHAR(50) NOT NULL, profession VARCHAR(20) NOT NULL, nom_dirigeant VARCHAR(50) NOT NULL, adresse VARCHAR(255) NOT NULL, complement_adresse VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(5) NOT NULL, ville VARCHAR(50) NOT NULL, telephone_societe VARCHAR(10) NOT NULL, telephone_dirigeant VARCHAR(10) NOT NULL, email VARCHAR(100) NOT NULL, images VARCHAR(255) DEFAULT NULL, date_creation DATE NOT NULL, date_resiliation DATE DEFAULT NULL, date_validation DATETIME DEFAULT NULL, status VARCHAR(20) DEFAULT NULL, droit_utilisateur VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_19653DBD26E94372 (siret), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ajouter');
        $this->addSql('DROP TABLE commune');
        $this->addSql('DROP TABLE employer');
        $this->addSql('DROP TABLE rdv');
        $this->addSql('DROP TABLE societe');
    }
}
