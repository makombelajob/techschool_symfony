<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250522094933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE payments_periods (payments_id INT NOT NULL, periods_id INT NOT NULL, INDEX IDX_375C4A00BBC61482 (payments_id), INDEX IDX_375C4A0086F6C98C (periods_id), PRIMARY KEY(payments_id, periods_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payments_periods ADD CONSTRAINT FK_375C4A00BBC61482 FOREIGN KEY (payments_id) REFERENCES payments (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payments_periods ADD CONSTRAINT FK_375C4A0086F6C98C FOREIGN KEY (periods_id) REFERENCES periods (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE payments_periods DROP FOREIGN KEY FK_375C4A00BBC61482
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE payments_periods DROP FOREIGN KEY FK_375C4A0086F6C98C
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE payments_periods
        SQL);
    }
}
