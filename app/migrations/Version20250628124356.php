<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250628124356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9450D2529');
        $this->addSql('DROP INDEX IDX_1483A5E9450D2529 ON users');
        $this->addSql('ALTER TABLE users CHANGE enfant_id parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9727ACA70 FOREIGN KEY (parent_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9727ACA70 ON users (parent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9727ACA70');
        $this->addSql('DROP INDEX IDX_1483A5E9727ACA70 ON users');
        $this->addSql('ALTER TABLE users CHANGE parent_id enfant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9450D2529 FOREIGN KEY (enfant_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1483A5E9450D2529 ON users (enfant_id)');
    }
}
