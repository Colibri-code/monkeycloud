<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200612075104 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE signup (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, full_name VARCHAR(30) NOT NULL, user_name VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_4EA31EEFE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, user_roles_id INT DEFAULT NULL, rol VARCHAR(10) NOT NULL, INDEX IDX_B63E2EC7D84AB5C4 (user_roles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE languages (id INT AUTO_INCREMENT NOT NULL, user_language_id INT DEFAULT NULL, language VARCHAR(10) NOT NULL, INDEX IDX_A0D153792BEA7361 (user_language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, comp_name VARCHAR(20) NOT NULL, departments JSON DEFAULT NULL, teams JSON DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_roles (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, project_id INT DEFAULT NULL, INDEX IDX_54FCD59FA76ED395 (user_id), UNIQUE INDEX UNIQ_54FCD59F166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, link_to_tasks_id INT DEFAULT NULL, sprint_id INT DEFAULT NULL, user_that_created_id INT NOT NULL, task_name VARCHAR(30) NOT NULL, summary VARCHAR(150) NOT NULL, date DATE NOT NULL, description VARCHAR(150) NOT NULL, time_tracking VARCHAR(30) DEFAULT NULL, watching VARCHAR(30) DEFAULT NULL, INDEX IDX_527EDB25E3FE3FCC (link_to_tasks_id), UNIQUE INDEX UNIQ_527EDB258C24077B (sprint_id), UNIQUE INDEX UNIQ_527EDB2554AEA738 (user_that_created_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, wiki VARCHAR(255) NOT NULL, labels JSON DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email_id INT NOT NULL, password_id INT NOT NULL, user_name_id INT NOT NULL, company_id INT DEFAULT NULL, department_id INT DEFAULT NULL, team_id INT DEFAULT NULL, assigned_task_id INT DEFAULT NULL, bio VARCHAR(100) DEFAULT NULL, is_visible TINYINT(1) NOT NULL, location VARCHAR(50) DEFAULT NULL, time_zone VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649A832C1C9 (email_id), UNIQUE INDEX UNIQ_8D93D6493E4A79C1 (password_id), UNIQUE INDEX UNIQ_8D93D649291A82DC (user_name_id), UNIQUE INDEX UNIQ_8D93D649979B1AD6 (company_id), UNIQUE INDEX UNIQ_8D93D649AE80F5DF (department_id), UNIQUE INDEX UNIQ_8D93D649296CD8AE (team_id), INDEX IDX_8D93D649872EB909 (assigned_task_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sprints (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, name VARCHAR(30) NOT NULL, UNIQUE INDEX UNIQ_4EE46971166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE roles ADD CONSTRAINT FK_B63E2EC7D84AB5C4 FOREIGN KEY (user_roles_id) REFERENCES user_roles (id)');
        $this->addSql('ALTER TABLE languages ADD CONSTRAINT FK_A0D153792BEA7361 FOREIGN KEY (user_language_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_roles ADD CONSTRAINT FK_54FCD59FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_roles ADD CONSTRAINT FK_54FCD59F166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25E3FE3FCC FOREIGN KEY (link_to_tasks_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB258C24077B FOREIGN KEY (sprint_id) REFERENCES sprints (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB2554AEA738 FOREIGN KEY (user_that_created_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A832C1C9 FOREIGN KEY (email_id) REFERENCES signup (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493E4A79C1 FOREIGN KEY (password_id) REFERENCES signup (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649291A82DC FOREIGN KEY (user_name_id) REFERENCES signup (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649AE80F5DF FOREIGN KEY (department_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649296CD8AE FOREIGN KEY (team_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649872EB909 FOREIGN KEY (assigned_task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE sprints ADD CONSTRAINT FK_4EE46971166D1F9C FOREIGN KEY (project_id) REFERENCES projects (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A832C1C9');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493E4A79C1');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649291A82DC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649979B1AD6');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649AE80F5DF');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649296CD8AE');
        $this->addSql('ALTER TABLE roles DROP FOREIGN KEY FK_B63E2EC7D84AB5C4');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25E3FE3FCC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649872EB909');
        $this->addSql('ALTER TABLE user_roles DROP FOREIGN KEY FK_54FCD59F166D1F9C');
        $this->addSql('ALTER TABLE sprints DROP FOREIGN KEY FK_4EE46971166D1F9C');
        $this->addSql('ALTER TABLE languages DROP FOREIGN KEY FK_A0D153792BEA7361');
        $this->addSql('ALTER TABLE user_roles DROP FOREIGN KEY FK_54FCD59FA76ED395');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB2554AEA738');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB258C24077B');
        $this->addSql('DROP TABLE signup');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE languages');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE user_roles');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE sprints');
    }
}
