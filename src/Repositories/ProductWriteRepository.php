<?php

namespace FileProcessor\Repositories;

use FileProcessor\Exceptions\CouldNotStoreProduct;
use FileProcessor\Models\Product;

class ProductWriteRepository extends DatabaseRepository
{
    public function store(Product $product): bool
    {
        try {
            $query = "INSERT INTO {$this->tableName()} (city, product, units, price, sales, user_id) VALUES (:city, :name, :units ,:price, :sales, :user)";

            $statement = $this->database->prepare($query);
            $statement->bindValue('city', $product->getCity());
            $statement->bindValue('name', $product->getName());
            $statement->bindValue('units', $product->getUnits());
            $statement->bindValue('price', $product->getPrice());
            $statement->bindValue('sales', $product->getSales());
            $statement->bindValue('user', $this->currentUserFilter);

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