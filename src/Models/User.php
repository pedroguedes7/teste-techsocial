<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\PreUpdate;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\HasLifecycleCallbacks
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

    /** @ORM\Column(type="string") */
    private $password;

    /** @ORM\Column(type="datetime") */
    private $created_at;

    /** @ORM\Column(type="datetime") */
    private $updated_at;

    // Getters and setters
    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    public function setSobrenome(string $sobrenome): void
    {
        $this->sobrenome = $sobrenome;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getDataNascimento(): \DateTime
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(\DateTime $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist(): void
    {
        $this->created_at = new \DateTime();
        $this->updated_at = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate(): void
    {
        $this->updated_at = new \DateTime();
    }
}
