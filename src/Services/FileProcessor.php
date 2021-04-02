<?php


namespace FileProcessor\Services;

use FileProcessor\Models\Product;
use FileProcessor\Repositories\ProductWriteRepository;

class FileProcessor
{
    const SEPARATOR = ',';

    private ProductWriteRepository $productWriteRepository;

    public function __construct(ProductWriteRepository $productWriteRepository)
    {
        $this->productWriteRepository = $productWriteRepository;
    }

    public function loadFile(string $path)
    {
        $file = fopen($path, 'r');
        fgetcsv($file); // line only to not process the header as a product

        while ($line = fgetcsv($file)) {
            $this->productWriteRepository->store(
                new Product(
                    $line[0],
                    $line[1],
                    (int) $line[2],
                    (float) $line[3]
                )
            );
        }
    }
}