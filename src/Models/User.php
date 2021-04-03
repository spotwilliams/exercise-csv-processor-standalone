<?php

namespace FileProcessor\Models;

class User
{
    private int $id;
    private string $username;
    private string $password;

    public function __construct(int $id, string $username, $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPasswordHash(): string
    {
        return $this->password;
    }
}