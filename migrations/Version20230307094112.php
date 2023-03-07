<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230307094112 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE default_text (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE owner_information (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', default_text_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', name VARCHAR(255) DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, account_type VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_2F9DC7059B08640D (default_text_id), INDEX index_id (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', owner_information_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', user_information_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D6496A8FA984 (owner_information_id), UNIQUE INDEX UNIQ_8D93D6494575EE58 (user_information_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_information (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', name VARCHAR(255) DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, account_type VARCHAR(255) DEFAULT NULL, setting VARCHAR(255) DEFAULT NULL, INDEX index_id (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE owner_information ADD CONSTRAINT FK_2F9DC7059B08640D FOREIGN KEY (default_text_id) REFERENCES default_text (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6496A8FA984 FOREIGN KEY (owner_information_id) REFERENCES owner_information (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6494575EE58 FOREIGN KEY (user_information_id) REFERENCES user_information (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE owner_information DROP FOREIGN KEY FK_2F9DC7059B08640D');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6496A8FA984');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6494575EE58');
        $this->addSql('DROP TABLE default_text');
        $this->addSql('DROP TABLE owner_information');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE user_information');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
