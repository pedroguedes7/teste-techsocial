<?php

namespace App\Services;

use App\Models\User;
use Doctrine\ORM\EntityManager;

class UserService
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createUser($data)
    {
        $user = new User();
        $user->setNome($data['nome']);
        $user->setSobrenome($data['sobrenome']);
        $user->setCpf($data['cpf']);
        $user->setEmail($data['email']);
        $user->setTelefone($data['telefone']);
        $user->setDataNascimento(new \DateTime($data['dataNascimento']));
        $user->setPassword(password_hash($data['senha'], PASSWORD_DEFAULT));

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function authenticate($username, $password)
    {
        $userRepository = $this->entityManager->getRepository(User::class);
        $user = $userRepository->findOneBy(['email' => $username]);

        if ($user && password_verify($password, $user->getPassword())) {
            return $user;
        }

        return null;
    }
}
