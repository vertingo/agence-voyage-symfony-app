<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181221203713 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vole ADD avion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vole ADD CONSTRAINT FK_D80B1D3D80BBB841 FOREIGN KEY (avion_id) REFERENCES avion (id)');
        $this->addSql('CREATE INDEX IDX_D80B1D3D80BBB841 ON vole (avion_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vole DROP FOREIGN KEY FK_D80B1D3D80BBB841');
        $this->addSql('DROP INDEX IDX_D80B1D3D80BBB841 ON vole');
        $this->addSql('ALTER TABLE vole DROP avion_id');
    }
}
