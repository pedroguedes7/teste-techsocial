<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240523120000 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Criação da tabela User';
    }

    public function up(Schema $schema) : void
    {
        // Criação da tabela users
        $this->addSql('CREATE TABLE users (
            id INT AUTO_INCREMENT NOT NULL,
            nome VARCHAR(255) NOT NULL,
            sobrenome VARCHAR(255) NOT NULL,
            cpf VARCHAR(11) NOT NULL,
            email VARCHAR(255) NOT NULL,
            telefone VARCHAR(20) NOT NULL,
            data_nascimento DATE NOT NULL,
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // Remover a tabela users
        $this->addSql('DROP TABLE users');
    }
}
