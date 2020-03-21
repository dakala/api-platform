<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200321201003 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE classes DROP CONSTRAINT fk_2ed7ec543330d24');
        $this->addSql('ALTER TABLE commodities DROP CONSTRAINT fk_6cfbd1cd9993bf61');
        $this->addSql('ALTER TABLE families DROP CONSTRAINT fk_995f3fcc6a411099');
        $this->addSql('DROP SEQUENCE segments_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE classes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE families_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE commodities_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE segment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE classification_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE family_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE commodity_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE greeting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE segment (id INT NOT NULL, segment INT NOT NULL, segment_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE classification (id INT NOT NULL, family_id_id INT NOT NULL, class INT NOT NULL, class_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_456BD23143330D24 ON classification (family_id_id)');
        $this->addSql('CREATE TABLE family (id INT NOT NULL, segment_id_id INT NOT NULL, family INT NOT NULL, family_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A5E6215B6A411099 ON family (segment_id_id)');
        $this->addSql('CREATE TABLE commodity (id INT NOT NULL, class_id_id INT NOT NULL, commodity INT NOT NULL, commodity_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5E8D2F749993BF61 ON commodity (class_id_id)');
        $this->addSql('CREATE TABLE greeting (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE classification ADD CONSTRAINT FK_456BD23143330D24 FOREIGN KEY (family_id_id) REFERENCES family (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE family ADD CONSTRAINT FK_A5E6215B6A411099 FOREIGN KEY (segment_id_id) REFERENCES segment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE commodity ADD CONSTRAINT FK_5E8D2F749993BF61 FOREIGN KEY (class_id_id) REFERENCES classification (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE families');
        $this->addSql('DROP TABLE classes');
        $this->addSql('DROP TABLE segments');
        $this->addSql('DROP TABLE commodities');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE family DROP CONSTRAINT FK_A5E6215B6A411099');
        $this->addSql('ALTER TABLE commodity DROP CONSTRAINT FK_5E8D2F749993BF61');
        $this->addSql('ALTER TABLE classification DROP CONSTRAINT FK_456BD23143330D24');
        $this->addSql('DROP SEQUENCE segment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE classification_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE family_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE commodity_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE greeting_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE segments_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE classes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE families_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE commodities_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE families (id INT NOT NULL, segment_id_id INT NOT NULL, family INT NOT NULL, family_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_995f3fcc6a411099 ON families (segment_id_id)');
        $this->addSql('CREATE TABLE classes (id INT NOT NULL, family_id_id INT NOT NULL, class INT NOT NULL, class_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_2ed7ec543330d24 ON classes (family_id_id)');
        $this->addSql('CREATE TABLE segments (id INT NOT NULL, segment INT NOT NULL, segment_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE commodities (id INT NOT NULL, class_id_id INT NOT NULL, commodity INT NOT NULL, commodity_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_6cfbd1cd9993bf61 ON commodities (class_id_id)');
        $this->addSql('ALTER TABLE families ADD CONSTRAINT fk_995f3fcc6a411099 FOREIGN KEY (segment_id_id) REFERENCES segments (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT fk_2ed7ec543330d24 FOREIGN KEY (family_id_id) REFERENCES families (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE commodities ADD CONSTRAINT fk_6cfbd1cd9993bf61 FOREIGN KEY (class_id_id) REFERENCES classes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE segment');
        $this->addSql('DROP TABLE classification');
        $this->addSql('DROP TABLE family');
        $this->addSql('DROP TABLE commodity');
        $this->addSql('DROP TABLE greeting');
    }
}
