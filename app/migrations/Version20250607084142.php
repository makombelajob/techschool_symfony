<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250607084142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE classes (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, level INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE classes_users (classes_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_BEEDD5579E225B24 (classes_id), INDEX IDX_BEEDD55767B3B43D (users_id), PRIMARY KEY(classes_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE contacts (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE courses (id INT AUTO_INCREMENT NOT NULL, subjects_id INT NOT NULL, classes_id INT NOT NULL, name VARCHAR(100) NOT NULL, coefficient DOUBLE PRECISION NOT NULL, day VARCHAR(100) NOT NULL, started_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', end_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', room VARCHAR(20) NOT NULL, INDEX IDX_A9A55A4C94AF957A (subjects_id), INDEX IDX_A9A55A4C9E225B24 (classes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE courses_users (courses_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_389EDBD0F9295384 (courses_id), INDEX IDX_389EDBD067B3B43D (users_id), PRIMARY KEY(courses_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ressources (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, file_type VARCHAR(10) NOT NULL, uploaded_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE ressources_courses (ressources_id INT NOT NULL, courses_id INT NOT NULL, INDEX IDX_F799735C3C361826 (ressources_id), INDEX IDX_F799735CF9295384 (courses_id), PRIMARY KEY(ressources_id, courses_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE results (id INT AUTO_INCREMENT NOT NULL, courses_id INT NOT NULL, users_id INT NOT NULL, note INT NOT NULL, monthly INT NOT NULL, yearly INT NOT NULL, remark VARCHAR(255) NOT NULL, INDEX IDX_9FA3E414F9295384 (courses_id), INDEX IDX_9FA3E41467B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE subjects (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, lastname VARCHAR(100) NOT NULL, firstname VARCHAR(100) NOT NULL, register_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', lastlogin DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE classes_users ADD CONSTRAINT FK_BEEDD5579E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE classes_users ADD CONSTRAINT FK_BEEDD55767B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C94AF957A FOREIGN KEY (subjects_id) REFERENCES subjects (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C9E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses_users ADD CONSTRAINT FK_389EDBD0F9295384 FOREIGN KEY (courses_id) REFERENCES courses (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses_users ADD CONSTRAINT FK_389EDBD067B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressources_courses ADD CONSTRAINT FK_F799735C3C361826 FOREIGN KEY (ressources_id) REFERENCES ressources (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressources_courses ADD CONSTRAINT FK_F799735CF9295384 FOREIGN KEY (courses_id) REFERENCES courses (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE results ADD CONSTRAINT FK_9FA3E414F9295384 FOREIGN KEY (courses_id) REFERENCES courses (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE results ADD CONSTRAINT FK_9FA3E41467B3B43D FOREIGN KEY (users_id) REFERENCES users (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE classes_users DROP FOREIGN KEY FK_BEEDD5579E225B24
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE classes_users DROP FOREIGN KEY FK_BEEDD55767B3B43D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C94AF957A
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C9E225B24
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses_users DROP FOREIGN KEY FK_389EDBD0F9295384
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses_users DROP FOREIGN KEY FK_389EDBD067B3B43D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressources_courses DROP FOREIGN KEY FK_F799735C3C361826
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE ressources_courses DROP FOREIGN KEY FK_F799735CF9295384
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE results DROP FOREIGN KEY FK_9FA3E414F9295384
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE results DROP FOREIGN KEY FK_9FA3E41467B3B43D
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE classes
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE classes_users
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE contacts
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE courses
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE courses_users
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ressources
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE ressources_courses
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE results
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE subjects
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE users
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
