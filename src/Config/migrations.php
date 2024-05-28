<?php

use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;

require_once __DIR__ . '/../../vendor/autoload.php';

// Obter o EntityManager
$entityManager = require_once __DIR__ . '/../../src/Config/bootstrap.php';

// Configuração das migrações
$config = new PhpFile(__DIR__ . '/../../src/Config/migrations-config.php');

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));
