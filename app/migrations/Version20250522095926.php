<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250522095926 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE results ADD users_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE results ADD CONSTRAINT FK_9FA3E41467B3B43D FOREIGN KEY (users_id) REFERENCES users (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9FA3E41467B3B43D ON results (users_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE results DROP FOREIGN KEY FK_9FA3E41467B3B43D
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_9FA3E41467B3B43D ON results
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE results DROP users_id
        SQL);
    }
}
