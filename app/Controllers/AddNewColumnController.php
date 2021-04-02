<?php

namespace App\Controllers;

use FileProcessor\Services\FormulaCreator;

class AddNewColumnController extends Controller
{
    public function __invoke(FormulaCreator $formulaCreator, $inputs)
    {
        $arguments = $inputs['operator'] === '&' ? 'expression' : 'operand';

        if ($arguments === 'expression') {
            $arguments = explode('&', $inputs[$arguments]);
        } else {
            $arguments = $inputs[$arguments];
        }
        try {
            $formulaCreator->storeFormula($inputs['name'], $inputs['operator'], $arguments);

            header('Location: /dashboard');
        } catch (\Exception $e) {
            return $this->render(['error' => $e->getMessage()]);
        }
    }

    public function viewName(): string
    {
        return 'column';
    }
}