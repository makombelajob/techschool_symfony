<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250522100131 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE results ADD courses_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE results ADD CONSTRAINT FK_9FA3E414F9295384 FOREIGN KEY (courses_id) REFERENCES courses (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9FA3E414F9295384 ON results (courses_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE results DROP FOREIGN KEY FK_9FA3E414F9295384
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_9FA3E414F9295384 ON results
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE results DROP courses_id
        SQL);
    }
}
