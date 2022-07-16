<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220715202337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE bokaal_items_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE bokaal_users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE bokaal_items (id INT NOT NULL, seller_id INT DEFAULT NULL, buyer_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, quantity INT NOT NULL, price INT NOT NULL, unit VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_943C1EA08DE820D9 ON bokaal_items (seller_id)');
        $this->addSql('CREATE INDEX IDX_943C1EA06C755722 ON bokaal_items (buyer_id)');
        $this->addSql('CREATE TABLE bokaal_users (id INT NOT NULL, admin_id INT DEFAULT NULL, fullname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, profile_img VARCHAR(255) DEFAULT NULL, bio TEXT DEFAULT NULL, location VARCHAR(255) DEFAULT NULL, postal_code INT DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, btw VARCHAR(255) DEFAULT NULL, company VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_61A15204642B8210 ON bokaal_users (admin_id)');
        $this->addSql('ALTER TABLE bokaal_items ADD CONSTRAINT FK_943C1EA08DE820D9 FOREIGN KEY (seller_id) REFERENCES bokaal_users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bokaal_items ADD CONSTRAINT FK_943C1EA06C755722 FOREIGN KEY (buyer_id) REFERENCES bokaal_users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE bokaal_users ADD CONSTRAINT FK_61A15204642B8210 FOREIGN KEY (admin_id) REFERENCES se_users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE bokaal_items DROP CONSTRAINT FK_943C1EA08DE820D9');
        $this->addSql('ALTER TABLE bokaal_items DROP CONSTRAINT FK_943C1EA06C755722');
        $this->addSql('DROP SEQUENCE bokaal_items_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE bokaal_users_id_seq CASCADE');
        $this->addSql('DROP TABLE bokaal_items');
        $this->addSql('DROP TABLE bokaal_users');
    }
}
