<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;

# Auth
$router->get('/', [new HomeController(), 'index']);

## Usuários
$router->get('/user/form-user', [new UserController(), 'create']);
$router->get('/user/submit-user', [new UserController(), 'store']);
