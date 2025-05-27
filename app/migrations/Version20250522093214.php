<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250522093214 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE class_rooms ADD periods_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE class_rooms ADD CONSTRAINT FK_9A763BA086F6C98C FOREIGN KEY (periods_id) REFERENCES periods (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9A763BA086F6C98C ON class_rooms (periods_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE class_rooms DROP FOREIGN KEY FK_9A763BA086F6C98C
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_9A763BA086F6C98C ON class_rooms
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE class_rooms DROP periods_id
        SQL);
    }
}
