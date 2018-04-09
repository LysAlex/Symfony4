<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180327070146 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stage ADD idEntreprise INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93698FEDE48A FOREIGN KEY (idEntreprise) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_C27C93698FEDE48A ON stage (idEntreprise)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93698FEDE48A');
        $this->addSql('DROP INDEX IDX_C27C93698FEDE48A ON stage');
        $this->addSql('ALTER TABLE stage DROP idEntreprise');
    }
}
