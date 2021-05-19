<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210519085425 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonces_categorie (annonces_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_9613BFBA4C2885D7 (annonces_id), INDEX IDX_9613BFBABCF5E72D (categorie_id), PRIMARY KEY(annonces_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonces_categorie ADD CONSTRAINT FK_9613BFBA4C2885D7 FOREIGN KEY (annonces_id) REFERENCES annonces (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonces_categorie ADD CONSTRAINT FK_9613BFBABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonces ADD user_id INT NOT NULL, ADD date_depot DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE annonces ADD CONSTRAINT FK_CB988C6FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_CB988C6FA76ED395 ON annonces (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE annonces_categorie');
        $this->addSql('ALTER TABLE annonces DROP FOREIGN KEY FK_CB988C6FA76ED395');
        $this->addSql('DROP INDEX IDX_CB988C6FA76ED395 ON annonces');
        $this->addSql('ALTER TABLE annonces DROP user_id, DROP date_depot');
    }
}
