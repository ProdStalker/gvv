<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220814173159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, project_id INT NOT NULL, name VARCHAR(50) NOT NULL, short_description VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_C4E0A61F727ACA70 (parent_id), UNIQUE INDEX UNIQ_C4E0A61F166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_member (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, team_id INT NOT NULL, started_at DATETIME NOT NULL, ended_at DATETIME DEFAULT NULL, INDEX IDX_6FFBDA1A76ED395 (user_id), INDEX IDX_6FFBDA1296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, short_description VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_role_team_member (team_role_id INT NOT NULL, team_member_id INT NOT NULL, INDEX IDX_8336E709297A539B (team_role_id), INDEX IDX_8336E709C292CD19 (team_member_id), PRIMARY KEY(team_role_id, team_member_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_project (user_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_77BECEE4A76ED395 (user_id), INDEX IDX_77BECEE4166D1F9C (project_id), PRIMARY KEY(user_id, project_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F727ACA70 FOREIGN KEY (parent_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE team_member ADD CONSTRAINT FK_6FFBDA1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE team_member ADD CONSTRAINT FK_6FFBDA1296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE team_role_team_member ADD CONSTRAINT FK_8336E709297A539B FOREIGN KEY (team_role_id) REFERENCES team_role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_role_team_member ADD CONSTRAINT FK_8336E709C292CD19 FOREIGN KEY (team_member_id) REFERENCES team_member (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_project ADD CONSTRAINT FK_77BECEE4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_project ADD CONSTRAINT FK_77BECEE4166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD slug VARCHAR(255) NOT NULL, ADD name VARCHAR(100) NOT NULL, ADD first_name VARCHAR(50) NOT NULL, ADD birth_date DATE NOT NULL, ADD is_banned TINYINT(1) NOT NULL, ADD is_active TINYINT(1) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME DEFAULT NULL, ADD activation_code VARCHAR(100) DEFAULT NULL, ADD phone VARCHAR(30) DEFAULT NULL, ADD nickname VARCHAR(100) DEFAULT NULL, ADD image_name VARCHAR(255) DEFAULT NULL, ADD password_reset_code VARCHAR(100) DEFAULT NULL, ADD is_public_profile TINYINT(1) NOT NULL, ADD logged_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F727ACA70');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F166D1F9C');
        $this->addSql('ALTER TABLE team_member DROP FOREIGN KEY FK_6FFBDA1A76ED395');
        $this->addSql('ALTER TABLE team_member DROP FOREIGN KEY FK_6FFBDA1296CD8AE');
        $this->addSql('ALTER TABLE team_role_team_member DROP FOREIGN KEY FK_8336E709297A539B');
        $this->addSql('ALTER TABLE team_role_team_member DROP FOREIGN KEY FK_8336E709C292CD19');
        $this->addSql('ALTER TABLE user_project DROP FOREIGN KEY FK_77BECEE4A76ED395');
        $this->addSql('ALTER TABLE user_project DROP FOREIGN KEY FK_77BECEE4166D1F9C');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE team_member');
        $this->addSql('DROP TABLE team_role');
        $this->addSql('DROP TABLE team_role_team_member');
        $this->addSql('DROP TABLE user_project');
        $this->addSql('ALTER TABLE user DROP slug, DROP name, DROP first_name, DROP birth_date, DROP is_banned, DROP is_active, DROP created_at, DROP updated_at, DROP activation_code, DROP phone, DROP nickname, DROP image_name, DROP password_reset_code, DROP is_public_profile, DROP logged_at');
    }
}
