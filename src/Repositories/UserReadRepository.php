<?php

namespace FileProcessor\Repositories;

use FileProcessor\Exceptions\CouldNotStoreFormula;
use FileProcessor\Models\Argument;
use FileProcessor\Models\Formula;
use FileProcessor\Models\User;

class UserReadRepository extends DatabaseRepository
{
    public function findByUsername(string $username): User
    {
        try {
            $query = "SELECT * FROM {$this->tableName()} where username = :user LIMIT 1";
            $statement = $this->database->prepare($query);
            $statement->bindValue('user', $username);
            $statement->execute();

            return $this->parse($statement->fetch(\PDO::FETCH_ASSOC));
        } catch (\Exception $e) {
            throw new \Exception('Could not find user with credentials provided', 500, $e);
        }

    }

    protected function tableName(): string
    {
        return 'users';
    }

    private function parse(array $rawResult): User
    {
        return new User($rawResult['id'], $rawResult['username'], $rawResult['password']);
    }
}