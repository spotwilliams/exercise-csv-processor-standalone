<?php

namespace FileProcessor\Models;

class MinusOperator extends Operator
{
    public function symbol(): string
    {
        return '-';
    }

    public function canOperateWith(Argument $argument): bool
    {
        return $this->isArithmetic($argument);
    }
}