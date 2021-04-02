<?php

namespace FileProcessor\Models;

abstract class Operator
{
    private array $arithmeticAllowed = [
        'units',
        'price',
        'sales'
    ];

    abstract public function symbol(): string;

    abstract public function canOperateWith(Argument $argument): bool;

    /**
     * @param Argument[] $arguments
     * @return mixed
     */
    public function apply(array $arguments): string
    {
        $result = array_reduce($arguments, function($carry, Argument $argument) {
            $carry .= $argument->getValue() . $this->symbol();

            return $carry;
        }, '');

        return '(' . mb_substr($result, 0, -1) . ')';
    }

    protected function isArithmetic(Argument $argument): bool
    {
        return in_array($argument->getValue(), $this->arithmeticAllowed);
    }
}