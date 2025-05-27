<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250522094804 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE users_courses (users_id INT NOT NULL, courses_id INT NOT NULL, INDEX IDX_59A52E8667B3B43D (users_id), INDEX IDX_59A52E86F9295384 (courses_id), PRIMARY KEY(users_id, courses_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_courses ADD CONSTRAINT FK_59A52E8667B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_courses ADD CONSTRAINT FK_59A52E86F9295384 FOREIGN KEY (courses_id) REFERENCES courses (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE users_courses DROP FOREIGN KEY FK_59A52E8667B3B43D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_courses DROP FOREIGN KEY FK_59A52E86F9295384
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE users_courses
        SQL);
    }
}
