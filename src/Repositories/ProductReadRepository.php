<?php

namespace FileProcessor\Repositories;

use FileProcessor\Models\Formula;

class ProductReadRepository extends DatabaseRepository
{
    public function getAllProductsWithFormula(array $formulas): array
    {
        $query = "SELECT id, product, city, units, price, {$this->applyFormula($formulas)} FROM {$this->tableName()}";
        $stmt = $this->database->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll( \PDO::FETCH_ASSOC);

    }

    protected function tableName(): string
    {
        return 'products';
    }

    /**
     * @param Formula[] $formulas
     */
    private function applyFormula(array $formulas): string
    {
        $query = '';
        foreach ($formulas as $formula)
            $query .= "{$formula->calculate()} as {$formula->getName()},";

        return  mb_substr($query, 0, -1);
    }
}