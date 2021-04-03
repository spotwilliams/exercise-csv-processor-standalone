<?php


namespace App\Controllers;

use FileProcessor\Repositories\FormulaReadRepository;
use FileProcessor\Repositories\ProductReadRepository;

class DashboardController extends Controller
{
    public function __invoke(ProductReadRepository $productReadRepository, FormulaReadRepository $formulaReadRepository)
    {

        try {
            $formulas = $formulaReadRepository->all();
            $products = $productReadRepository->getAllProductsWithFormula($formulas);
            $headers = current($products) ? array_keys(current($products)) : ['product'];
            return $this->render(['headers' => $headers, 'products' => $products]);
        } catch (\Exception $e) {
            return $this->render(['error' => $e->getMessage(), 'headers' => [], 'products' => []]);
        }
    }

    public function viewName(): string
    {
        return 'table';
    }
}