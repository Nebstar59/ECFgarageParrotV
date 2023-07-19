<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230716154825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestation ADD garage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FADC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('CREATE INDEX IDX_51C88FADC4FFF555 ON prestation (garage_id)');
        $this->addSql('ALTER TABLE service ADD garage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD2C4FFF555 ON service (garage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FADC4FFF555');
        $this->addSql('DROP INDEX IDX_51C88FADC4FFF555 ON prestation');
        $this->addSql('ALTER TABLE prestation DROP garage_id');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2C4FFF555');
        $this->addSql('DROP INDEX IDX_E19D9AD2C4FFF555 ON service');
        $this->addSql('ALTER TABLE service DROP garage_id');
    }
}
