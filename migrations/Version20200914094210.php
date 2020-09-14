<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200914094210 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creator (id INT AUTO_INCREMENT NOT NULL, job_id INT DEFAULT NULL, full_name VARCHAR(255) NOT NULL, INDEX IDX_BC06EA63BE04EA9 (job_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE extended_information (id INT AUTO_INCREMENT NOT NULL, media_id INT NOT NULL, staff_list LONGTEXT DEFAULT NULL, classification VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_241B99C2EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, creator_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, release_date DATE DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_6A2CA10C12469DE2 (category_id), INDEX IDX_6A2CA10C61220EA6 (creator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_tag (media_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_48D8C57EEA9FDD75 (media_id), INDEX IDX_48D8C57EBAD26311 (tag_id), PRIMARY KEY(media_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE creator ADD CONSTRAINT FK_BC06EA63BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id)');
        $this->addSql('ALTER TABLE extended_information ADD CONSTRAINT FK_241B99C2EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C61220EA6 FOREIGN KEY (creator_id) REFERENCES creator (id)');
        $this->addSql('ALTER TABLE media_tag ADD CONSTRAINT FK_48D8C57EEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_tag ADD CONSTRAINT FK_48D8C57EBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C12469DE2');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C61220EA6');
        $this->addSql('ALTER TABLE creator DROP FOREIGN KEY FK_BC06EA63BE04EA9');
        $this->addSql('ALTER TABLE extended_information DROP FOREIGN KEY FK_241B99C2EA9FDD75');
        $this->addSql('ALTER TABLE media_tag DROP FOREIGN KEY FK_48D8C57EEA9FDD75');
        $this->addSql('ALTER TABLE media_tag DROP FOREIGN KEY FK_48D8C57EBAD26311');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE creator');
        $this->addSql('DROP TABLE extended_information');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE media_tag');
        $this->addSql('DROP TABLE tag');
    }
}
