<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250522092826 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE courses ADD classroom_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C6278D5A8 FOREIGN KEY (classroom_id) REFERENCES class_rooms (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A9A55A4C6278D5A8 ON courses (classroom_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C6278D5A8
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A9A55A4C6278D5A8 ON courses
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses DROP classroom_id
        SQL);
    }
}
