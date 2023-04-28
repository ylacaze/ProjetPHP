<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230321141758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__i23_user AS SELECT id, login, roles, password FROM i23_user');
        $this->addSql('DROP TABLE i23_user');
        $this->addSql('CREATE TABLE i23_user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, login VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, nom VARCHAR(40) NOT NULL, prenom VARCHAR(40) NOT NULL, date_naiss DATE DEFAULT NULL)');
        $this->addSql('INSERT INTO i23_user (id, login, roles, password) SELECT id, login, roles, password FROM __temp__i23_user');
        $this->addSql('DROP TABLE __temp__i23_user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_100F4CEAA08CB10 ON i23_user (login)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__i23_user AS SELECT id, login, roles, password FROM i23_user');
        $this->addSql('DROP TABLE i23_user');
        $this->addSql('CREATE TABLE i23_user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, login VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO i23_user (id, login, roles, password) SELECT id, login, roles, password FROM __temp__i23_user');
        $this->addSql('DROP TABLE __temp__i23_user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649AA08CB10 ON i23_user (login)');
    }
}
