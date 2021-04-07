<?php

namespace FileProcessor\Models;

class DivisorOperator extends Operator
{
    public function symbol(): string
    {
        return '/';
    }

    /**
     * @param Argument[] $arguments
     * @return mixed
     */
    public function apply(array $arguments): string
    {
        return "(CASE {$arguments[1]} WHEN 0 THEN null ELSE ({$arguments[0]} / {$arguments[1]}) END)";
    }

    public function canOperateWith(Argument $argument): bool
    {
        return $this->isArithmetic($argument);
    }
}