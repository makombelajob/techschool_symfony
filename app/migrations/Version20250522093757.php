<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250522093757 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE courses ADD subjects_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C94AF957A FOREIGN KEY (subjects_id) REFERENCES subjects (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A9A55A4C94AF957A ON courses (subjects_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C94AF957A
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A9A55A4C94AF957A ON courses
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses DROP subjects_id
        SQL);
    }
}
