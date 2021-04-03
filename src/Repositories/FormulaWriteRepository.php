<?php

namespace FileProcessor\Repositories;

use FileProcessor\Exceptions\CouldNotStoreFormula;
use FileProcessor\Models\Formula;

class FormulaWriteRepository extends DatabaseRepository
{
    public function store(Formula $formula): bool
    {
        try {
            $query = "INSERT INTO {$this->tableName()} (name, operator, arguments, user_id) VALUES (:name, :operator, :arguments, :user)";
            $statement = $this->database->prepare($query);
            $statement->bindValue('name', $formula->getName());
            $statement->bindValue('operator',  addslashes(get_class($formula->getOperator())));
            $statement->bindValue('arguments', json_encode($formula->getArgumentsAsArray()));
            $statement->bindValue('user', $this->currentUserFilter);

            return $statement->execute();

        } catch (\Exception $e) {
            throw new CouldNotStoreFormula($formula, $e);
        }
    }

    protected function tableName(): string
    {
        return 'formulas';
    }
}