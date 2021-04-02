<?php

namespace FileProcessor\Repositories;

use FileProcessor\Exceptions\CouldNotStoreProduct;
use FileProcessor\Models\Product;

class ProductWriteRepository extends DatabaseRepository
{
    public function store(Product $product): bool
    {
        try {
            $query = "INSERT INTO {$this->tableName()} (city, product, units, price) VALUES (:city, :name, :units ,:price)";
            $statement = $this->database->prepare($query);
            $statement->bindValue('city', $product->getCity());
            $statement->bindValue('name', $product->getName());
            $statement->bindValue('units', $product->getUnits());
            $statement->bindValue('price', $product->getPrice(), \PDO::PARAM_INT);
            return $statement->execute();
        } catch (\Exception $e) {
            throw new CouldNotStoreProduct($product, $e);
        }
    }

    protected function tableName(): string
    {
        return 'products';
    }
}