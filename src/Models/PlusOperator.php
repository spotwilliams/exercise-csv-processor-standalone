<?php

namespace FileProcessor\Models;

class PlusOperator extends Operator
{
    public function canOperateWith(Argument $argument): bool
    {
        return $this->isArithmetic($argument);
    }

    public function symbol(): string
    {
        return '+';
    }
}