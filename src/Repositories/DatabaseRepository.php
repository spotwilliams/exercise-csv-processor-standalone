<?php

namespace FileProcessor\Repositories;

abstract class DatabaseRepository
{
    protected \PDO $database;

    public function __construct()
    {
        $this->database = new \PDO(
            'pgsql:host=db;dbname=catexercise;port=5432', 'catexercise', 'catexercise'
        );
    }

    abstract protected function tableName(): string;
}