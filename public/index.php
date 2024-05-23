<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Core\Request;

// Autoload das classes

$request = new Request();
$router = new Router($request);

// Inclua o arquivo de configuração das rotas
include __DIR__ . '/../src/config/routes.php';

// Resolva a rota
$router->resolve();
