<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200911100710 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles ADD auteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD316860BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_BFDD316860BB6FE6 ON articles (auteur_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6491EBAF6CC');
        $this->addSql('DROP INDEX IDX_8D93D6491EBAF6CC ON user');
        $this->addSql('ALTER TABLE user DROP articles_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD316860BB6FE6');
        $this->addSql('DROP INDEX IDX_BFDD316860BB6FE6 ON articles');
        $this->addSql('ALTER TABLE articles DROP auteur_id');
        $this->addSql('ALTER TABLE user ADD articles_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6491EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D6491EBAF6CC ON user (articles_id)');
    }
}
