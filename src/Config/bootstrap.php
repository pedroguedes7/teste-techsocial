<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__ . "/../../vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: array(__DIR__. "/src/Models"),
    isDevMode: true,
);

$dbParams = [
    'driver'   => 'pdo_mysql',
    'host'     => 'db',
    'user'     => 'techsocial',
    'password' => 'techsocial@123',
    'dbname'   => 'teste_techsocial',
];

// configuring the database connection
$connection = DriverManager::getConnection($dbParams, $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);

// Verificando se $entityManager é um objeto EntityManager
if (!($entityManager instanceof EntityManager)) {
    throw new \RuntimeException("Falha ao criar o EntityManager.");
}

return $entityManager;
