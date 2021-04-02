<?php

include 'autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
try {

    $formula = new \FileProcessor\Models\Formula(
        'manual_column',
        new \FileProcessor\Models\PlusOperator(),
        [
            new \FileProcessor\Models\Argument("price"),
            new \FileProcessor\Models\Argument("units"),
            new \FileProcessor\Models\Argument("wrong"),
        ]
    );

    var_dump($formula);

} catch (\FileProcessor\Exceptions\CanNotUseParameterInOperation $e) {
    echo $e->getMessage() . PHP_EOL;
}


try {
    $service = new \FileProcessor\Services\FormulaCreator(
        new \FileProcessor\Repositories\FormulaWriteRepository()
    );

    var_dump($service->storeFormula('test', '+', ['units', 'price']));
    echo "Stored" . PHP_EOL;

}catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}