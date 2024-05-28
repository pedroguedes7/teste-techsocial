<?php

namespace App\Controllers;

use App\Services\UserService;

class UserController
{
    private $userService;

    public function __construct()
    {
        $entityManager = require_once __DIR__ . '/../Config/bootstrap.php';
        $this->userService = new UserService($entityManager);
    }

    public function create()
    {
        require_once __DIR__ . '/../Views/user/form-user.html';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->userService->createUser($_POST);
            echo "User salvo com sucesso!";
        } else {
            echo "Método de requisição inválido.";
        }
    }

    public function teste()
    {
        require_once __DIR__ . '/../Config/test-db.php';
    }

    public function login()
    {
        require_once __DIR__ . '/../Views/user/login.html';
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['usuario'];
            $password = $_POST['senha'];
            $user = $this->userService->authenticate($username, $password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user->getId();
                header('Location: /');
                exit;
            } else {
                header('Location: /login?error=invalid_credentials');
                exit;
            }
        }
    }
}
