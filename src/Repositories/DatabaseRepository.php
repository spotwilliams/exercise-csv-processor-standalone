<?php

namespace FileProcessor\Repositories;

abstract class DatabaseRepository
{
    protected \PDO $database;
    protected int $currentUserFilter;

    public function __construct()
    {
        $this->database = new \PDO(
            DB_ENGINE . ':host=db;dbname='. DB .';port=5432', USER_DB, PASS_DB
        );

        $this->database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $this->currentUserFilter = $_SESSION['user_id'] ?? -1; // is not logged in, but will never have a valid user
    }

    abstract protected function tableName(): string;
}