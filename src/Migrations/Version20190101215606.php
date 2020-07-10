<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190101215606 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vole ADD compagnie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vole ADD CONSTRAINT FK_D80B1D3D52FBE437 FOREIGN KEY (compagnie_id) REFERENCES compagnie (id)');
        $this->addSql('CREATE INDEX IDX_D80B1D3D52FBE437 ON vole (compagnie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vole DROP FOREIGN KEY FK_D80B1D3D52FBE437');
        $this->addSql('DROP INDEX IDX_D80B1D3D52FBE437 ON vole');
        $this->addSql('ALTER TABLE vole DROP compagnie_id');
    }
}
