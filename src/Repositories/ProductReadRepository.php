<?php

namespace FileProcessor\Repositories;

use FileProcessor\Models\Formula;

class ProductReadRepository extends DatabaseRepository
{
    public function getAllProductsWithFormula(array $formulas): array
    {
        try {
            $query = "SELECT product, city, units, price, sales {$this->applyFormula($formulas)} FROM {$this->tableName()} WHERE user_id = :user";
            $stmt = $this->database->prepare($query);

            $stmt->bindValue('user', $this->currentUserFilter);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            var_dump( $query);
            throw new \Exception('Could not take all products to show', 500, $e);
        }
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
        $query = ','; // to separate from previous columns
        foreach ($formulas as $formula)
            $query .= "{$formula->calculate()} as {$formula->getName()},";

        return mb_substr($query, 0, -1);
    }
}