<?php

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Core\Request;

$request = new Request();
$router = new Router($request);

// Rota pública
$router->get('/', [new HomeController(), 'index']);

// Middleware para proteger rotas
$router->before('get', '/user/form-user', function() {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
});

$router->before('post', '/user/submit-user', function() {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
});

$router->before('get', '/teste-db', function() {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }
});

// Rotas protegidas
$router->get('/user/form-user', [new UserController(), 'create']);
$router->post('/user/submit-user', [new UserController(), 'store']);
$router->get('/teste-db', [new UserController(), 'teste']);

// Rota de login
$router->get('/login', [new UserController(), 'login']);
$router->post('/login', [new UserController(), 'authenticate']);

// Executa o roteador
$router->resolve();
