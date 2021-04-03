<?php

namespace FileProcessor\Repositories;

use FileProcessor\Exceptions\CouldNotStoreFormula;
use FileProcessor\Models\Argument;
use FileProcessor\Models\Formula;

class FormulaReadRepository extends DatabaseRepository
{
    public function all(): array
    {

        try {
            $query = "SELECT * FROM {$this->tableName()} where user_id = :user";
            $statement = $this->database->prepare($query);
            $statement->bindValue('user', $this->currentUserFilter);
            $statement->execute();
            return $this->parse($statement->fetchAll());
        } catch (\Exception $e) {
            throw new \Exception('Could not take custom columns', 500, $e);
        }

    }

    protected function tableName(): string
    {
        return 'formulas';
    }

    private function parse(array $rawResult)
    {
        return array_map(function ($item) {

            $operator = stripslashes($item['operator']);

            $arguments = array_map(function ($item) {
                return new Argument($item);
            }, json_decode($item['arguments']));

            return new Formula(
                $item['name'],
                new $operator(),
                $arguments
            );
        }, $rawResult);
    }
}