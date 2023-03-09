<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230309012854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company_information (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', company_name VARCHAR(255) NOT NULL, company_type VARCHAR(255) NOT NULL, company_number VARCHAR(255) NOT NULL, duplicate_number TINYINT(1) NOT NULL, company_logo VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, states VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, is_created DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE default_company (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', title VARCHAR(255) NOT NULL, company_logo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE login_user (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', owner_information_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', user_information_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', email VARCHAR(180) NOT NULL, is_active TINYINT(1) DEFAULT 0 NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_4BE15D0CE7927C74 (email), UNIQUE INDEX UNIQ_4BE15D0C6A8FA984 (owner_information_id), UNIQUE INDEX UNIQ_4BE15D0C4575EE58 (user_information_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE owner_information (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', default_company_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', company_information_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', name VARCHAR(255) DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, user_number VARCHAR(255) DEFAULT NULL, account_type VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_2F9DC705DFB84EB5 (default_company_id), UNIQUE INDEX UNIQ_2F9DC705381EA2 (company_information_id), INDEX index_id (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_information (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', name VARCHAR(255) DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, user_number VARCHAR(255) DEFAULT NULL, account_type VARCHAR(255) DEFAULT NULL, setting VARCHAR(255) DEFAULT NULL, INDEX index_id (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE login_user ADD CONSTRAINT FK_4BE15D0C6A8FA984 FOREIGN KEY (owner_information_id) REFERENCES owner_information (id)');
        $this->addSql('ALTER TABLE login_user ADD CONSTRAINT FK_4BE15D0C4575EE58 FOREIGN KEY (user_information_id) REFERENCES user_information (id)');
        $this->addSql('ALTER TABLE owner_information ADD CONSTRAINT FK_2F9DC705DFB84EB5 FOREIGN KEY (default_company_id) REFERENCES default_company (id)');
        $this->addSql('ALTER TABLE owner_information ADD CONSTRAINT FK_2F9DC705381EA2 FOREIGN KEY (company_information_id) REFERENCES company_information (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE login_user DROP FOREIGN KEY FK_4BE15D0C6A8FA984');
        $this->addSql('ALTER TABLE login_user DROP FOREIGN KEY FK_4BE15D0C4575EE58');
        $this->addSql('ALTER TABLE owner_information DROP FOREIGN KEY FK_2F9DC705DFB84EB5');
        $this->addSql('ALTER TABLE owner_information DROP FOREIGN KEY FK_2F9DC705381EA2');
        $this->addSql('DROP TABLE company_information');
        $this->addSql('DROP TABLE default_company');
        $this->addSql('DROP TABLE login_user');
        $this->addSql('DROP TABLE owner_information');
        $this->addSql('DROP TABLE user_information');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
