<?php

class User
{
    private $email;
    private $password;
    private $name;
    private $surname;
    private $phone;
    private $user_role;

    public function __construct(
        string $email,
        string $password,
        string $name,
        string $surname,
        int $user_role = 1
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->user_role =$user_role;
    }

    public function getUser_role(): int
    {
        return $this->user_role;
    }

    public function setUser_role(int $user_role): void
    {
        $this->user_role = $user_role;
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