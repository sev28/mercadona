<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231111093528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE catalogue ADD products_id INT NOT NULL, ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE catalogue ADD CONSTRAINT FK_59A699F56C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE catalogue ADD CONSTRAINT FK_59A699F512469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_59A699F56C8A81A9 ON catalogue (products_id)');
        $this->addSql('CREATE INDEX IDX_59A699F512469DE2 ON catalogue (category_id)');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C14A7843DC');
        $this->addSql('DROP INDEX IDX_64C19C14A7843DC ON category');
        $this->addSql('ALTER TABLE category DROP catalogue_id');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A4A7843DC');
        $this->addSql('DROP INDEX IDX_B3BA5A5A4A7843DC ON products');
        $this->addSql('ALTER TABLE products DROP catalogue_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE catalogue DROP FOREIGN KEY FK_59A699F56C8A81A9');
        $this->addSql('ALTER TABLE catalogue DROP FOREIGN KEY FK_59A699F512469DE2');
        $this->addSql('DROP INDEX IDX_59A699F56C8A81A9 ON catalogue');
        $this->addSql('DROP INDEX IDX_59A699F512469DE2 ON catalogue');
        $this->addSql('ALTER TABLE catalogue DROP products_id, DROP category_id');
        $this->addSql('ALTER TABLE category ADD catalogue_id INT NOT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C14A7843DC FOREIGN KEY (catalogue_id) REFERENCES catalogue (id)');
        $this->addSql('CREATE INDEX IDX_64C19C14A7843DC ON category (catalogue_id)');
        $this->addSql('ALTER TABLE products ADD catalogue_id INT NOT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A4A7843DC FOREIGN KEY (catalogue_id) REFERENCES catalogue (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A4A7843DC ON products (catalogue_id)');
    }
}
