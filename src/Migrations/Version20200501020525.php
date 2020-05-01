<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200501020525 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE epic (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, epic_name VARCHAR(255) NOT NULL, summary VARCHAR(500) NOT NULL, attachment VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, created DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', updated DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', date DATE NOT NULL, reported VARCHAR(255) NOT NULL, user_created VARCHAR(255) NOT NULL, assignee LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', participants LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', linked_tasks VARCHAR(255) NOT NULL, time_tracking TIME NOT NULL, watching VARCHAR(255) NOT NULL, sprint VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projects DROP key_project');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE epic');
        $this->addSql('ALTER TABLE projects ADD key_project VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
