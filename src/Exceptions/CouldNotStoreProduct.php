<?php

namespace FileProcessor\Exceptions;

use FileProcessor\Models\Product;

class CouldNotStoreProduct extends \Exception
{
    private Product $product;

    public function __construct(Product $product, \Throwable $previous = null)
    {
        parent::__construct("Could not save the product `{$product->getName()}`", 500, $previous);
        $this->product = $product;
    }

}