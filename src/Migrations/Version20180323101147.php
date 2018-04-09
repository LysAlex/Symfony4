<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180323101147 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nom_entreprise TINYTEXT NOT NULL, ville_entreprise TINYTEXT NOT NULL, cp_entreprise INT NOT NULL, mail_entreprise TINYTEXT NOT NULL, tel_entreprise VARCHAR(20) NOT NULL, activite_entreprise LONGTEXT NOT NULL, active SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, date_stage DATE NOT NULL, idUserEleve INT DEFAULT NULL, idUserProf INT DEFAULT NULL, idTuteur INT DEFAULT NULL, INDEX IDX_C27C9369F62E3D77 (idUserEleve), INDEX IDX_C27C9369E568DAF (idUserProf), INDEX IDX_C27C936935508AF2 (idTuteur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tuteur (id INT AUTO_INCREMENT NOT NULL, nom_tuteur TINYTEXT NOT NULL, prenom_tuteur TINYTEXT NOT NULL, mail_tuteur TINYTEXT NOT NULL, tel_tuteur VARCHAR(20) NOT NULL, idEntreprise INT DEFAULT NULL, INDEX IDX_564122688FEDE48A (idEntreprise), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_eleve (id INT AUTO_INCREMENT NOT NULL, nom_eleve LONGTEXT NOT NULL, prenom_eleve LONGTEXT NOT NULL, classe_eleve INT NOT NULL, annee_scolaire LONGTEXT NOT NULL, login LONGTEXT NOT NULL, password LONGTEXT NOT NULL, role VARCHAR(200) NOT NULL, present SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_prof (id INT AUTO_INCREMENT NOT NULL, nom_prof LONGTEXT NOT NULL, prenom_prof LONGTEXT NOT NULL, login LONGTEXT NOT NULL, password LONGTEXT NOT NULL, role VARCHAR(200) NOT NULL, present SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369F62E3D77 FOREIGN KEY (idUserEleve) REFERENCES user_eleve (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369E568DAF FOREIGN KEY (idUserProf) REFERENCES user_prof (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C936935508AF2 FOREIGN KEY (idTuteur) REFERENCES tuteur (id)');
        $this->addSql('ALTER TABLE tuteur ADD CONSTRAINT FK_564122688FEDE48A FOREIGN KEY (idEntreprise) REFERENCES entreprise (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tuteur DROP FOREIGN KEY FK_564122688FEDE48A');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C936935508AF2');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369F62E3D77');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369E568DAF');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE tuteur');
        $this->addSql('DROP TABLE user_eleve');
        $this->addSql('DROP TABLE user_prof');
    }
}
