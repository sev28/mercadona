<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231112090244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A139DF194');
        $this->addSql('DROP INDEX IDX_B3BA5A5A139DF194 ON products');
        $this->addSql('ALTER TABLE products DROP promotion_id');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD14584665A');
        $this->addSql('DROP INDEX UNIQ_C11D7DD14584665A ON promotion');
        $this->addSql('ALTER TABLE promotion DROP product_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products ADD promotion_id INT NOT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A139DF194 ON products (promotion_id)');
        $this->addSql('ALTER TABLE promotion ADD product_id INT NOT NULL');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD14584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C11D7DD14584665A ON promotion (product_id)');
    }
}
