<?php


namespace App\Controllers;

use FileProcessor\Repositories\FormulaReadRepository;
use FileProcessor\Repositories\ProductReadRepository;

class DashboardController extends Controller
{
    public function __invoke(ProductReadRepository $productReadRepository, FormulaReadRepository $formulaReadRepository)
    {
        $formulas = $formulaReadRepository->all();
        $products = $productReadRepository->getAllProductsWithFormula($formulas);

        return $this->render(['headers' => array_keys(current($products)), 'products' => $products]);
    }

    public function viewName(): string
    {
        return 'table';
    }
}