<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200911134700 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE example DROP FOREIGN KEY FK_6EEC9B9FDD62C21B');
        $this->addSql('ALTER TABLE example ADD CONSTRAINT FK_6EEC9B9FDD62C21B FOREIGN KEY (child_id) REFERENCES mapped_superclass (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE example DROP FOREIGN KEY FK_6EEC9B9FDD62C21B');
        $this->addSql('ALTER TABLE example ADD CONSTRAINT FK_6EEC9B9FDD62C21B FOREIGN KEY (child_id) REFERENCES child (id)');
    }
}
