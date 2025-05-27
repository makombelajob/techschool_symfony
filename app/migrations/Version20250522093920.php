<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250522093920 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE courses_ressources (courses_id INT NOT NULL, ressources_id INT NOT NULL, INDEX IDX_60328312F9295384 (courses_id), INDEX IDX_603283123C361826 (ressources_id), PRIMARY KEY(courses_id, ressources_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses_ressources ADD CONSTRAINT FK_60328312F9295384 FOREIGN KEY (courses_id) REFERENCES courses (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses_ressources ADD CONSTRAINT FK_603283123C361826 FOREIGN KEY (ressources_id) REFERENCES ressources (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE courses_ressources DROP FOREIGN KEY FK_60328312F9295384
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE courses_ressources DROP FOREIGN KEY FK_603283123C361826
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE courses_ressources
        SQL);
    }
}
