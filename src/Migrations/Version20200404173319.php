<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200404173319 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, resume_id INT DEFAULT NULL, years VARCHAR(255) NOT NULL, school VARCHAR(255) NOT NULL, speciality VARCHAR(255) DEFAULT NULL, INDEX IDX_404021BFD262AF09 (resume_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, resume_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, percent_mastered INT NOT NULL, favorite TINYINT(1) NOT NULL, INDEX IDX_5E3DE477D262AF09 (resume_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, postal_code VARCHAR(5) NOT NULL, city VARCHAR(255) NOT NULL, birth_date DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resume (id INT AUTO_INCREMENT NOT NULL, information_id INT DEFAULT NULL, bio LONGTEXT DEFAULT NULL, catchy LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_60C1D0A02EF03101 (information_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hobby (id INT AUTO_INCREMENT NOT NULL, resume_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_3964F337D262AF09 (resume_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE xp_pro (id INT AUTO_INCREMENT NOT NULL, resume_id INT DEFAULT NULL, years VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, favorite TINYINT(1) NOT NULL, INDEX IDX_A8FADED9D262AF09 (resume_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFD262AF09 FOREIGN KEY (resume_id) REFERENCES resume (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE477D262AF09 FOREIGN KEY (resume_id) REFERENCES resume (id)');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A02EF03101 FOREIGN KEY (information_id) REFERENCES information (id)');
        $this->addSql('ALTER TABLE hobby ADD CONSTRAINT FK_3964F337D262AF09 FOREIGN KEY (resume_id) REFERENCES resume (id)');
        $this->addSql('ALTER TABLE xp_pro ADD CONSTRAINT FK_A8FADED9D262AF09 FOREIGN KEY (resume_id) REFERENCES resume (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A02EF03101');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFD262AF09');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE477D262AF09');
        $this->addSql('ALTER TABLE hobby DROP FOREIGN KEY FK_3964F337D262AF09');
        $this->addSql('ALTER TABLE xp_pro DROP FOREIGN KEY FK_A8FADED9D262AF09');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE resume');
        $this->addSql('DROP TABLE hobby');
        $this->addSql('DROP TABLE xp_pro');
    }
}
