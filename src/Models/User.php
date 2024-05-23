<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /** @ORM\Column(type="string") */
    private $nome;

    /** @ORM\Column(type="string") */
    private $sobrenome;

    /** @ORM\Column(type="string") */
    private $cpf;

    /** @ORM\Column(type="string") */
    private $email;

    /** @ORM\Column(type="string") */
    private $telefone;

    /** @ORM\Column(type="date") */
    private $dataNascimento;

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function getDataNascimento(): \DateTime
    {
        return $this->dataNascimento;
    }

    // Setters
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setSobrenome(string $sobrenome): void
    {
        $this->sobrenome = $sobrenome;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function setDataNascimento(\DateTime $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }
}
