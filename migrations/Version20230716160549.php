<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230716160549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE testimonial ADD service_id INT DEFAULT NULL, ADD prestation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE testimonial ADD CONSTRAINT FK_E6BDCDF7ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE testimonial ADD CONSTRAINT FK_E6BDCDF79E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id)');
        $this->addSql('CREATE INDEX IDX_E6BDCDF7ED5CA9E6 ON testimonial (service_id)');
        $this->addSql('CREATE INDEX IDX_E6BDCDF79E45C554 ON testimonial (prestation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE testimonial DROP FOREIGN KEY FK_E6BDCDF7ED5CA9E6');
        $this->addSql('ALTER TABLE testimonial DROP FOREIGN KEY FK_E6BDCDF79E45C554');
        $this->addSql('DROP INDEX IDX_E6BDCDF7ED5CA9E6 ON testimonial');
        $this->addSql('DROP INDEX IDX_E6BDCDF79E45C554 ON testimonial');
        $this->addSql('ALTER TABLE testimonial DROP service_id, DROP prestation_id');
    }
}
