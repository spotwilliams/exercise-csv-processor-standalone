<?php


namespace FileProcessor\Services;

use FileProcessor\Exceptions\OperationInvalid;
use FileProcessor\Models\AmpersandOperator;
use FileProcessor\Models\Argument;
use FileProcessor\Models\DivisorOperator;
use FileProcessor\Models\Formula;
use FileProcessor\Models\MinusOperator;
use FileProcessor\Models\MultiplierOperator;
use FileProcessor\Models\PlusOperator;
use FileProcessor\Repositories\FormulaWriteRepository;

class FormulaCreator
{
    private FormulaWriteRepository $formulaWriteRepository;
    private array $operators;

    public function __construct(FormulaWriteRepository $formulaWriteRepository)
    {
        $this->formulaWriteRepository = $formulaWriteRepository;
        $this->operators = [
            '&' => AmpersandOperator::class,
            '+' => PlusOperator::class,
            '-' => MinusOperator::class,
            '*' => MultiplierOperator::class,
            '/' => DivisorOperator::class,
        ];
    }

    public function storeFormula(string $name, string $operator, array $arguments)
    {
        $operator = (new $this->operators[$operator]()) ?? null;
        if (! $operator) {
            throw new OperationInvalid();
        }

        $arguments = array_map(function ($item) {
            return new Argument($item);
        }, $arguments);


        return $this->formulaWriteRepository->store(new Formula(
            $name,
            $operator,
            $arguments
        ));
    }
}