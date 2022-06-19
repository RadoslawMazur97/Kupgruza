<?php

class User
{
    private $email;
    private $password;
    private $name;
    private $surname;
    private $phone;
    private $is_admin;

    public function __construct(
        string $email,
        string $password,
        string $name,
        string $surname,
        int $is_admin = 0
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->is_admin =$is_admin;
    }

    public function getIsAdmin(): int
    {
        return $this->is_admin;
    }

    public function setIsAdmin(int $is_admin): void
    {
        $this->is_admin = $is_admin;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }
}