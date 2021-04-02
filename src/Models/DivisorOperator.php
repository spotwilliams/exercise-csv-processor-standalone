<?php

namespace FileProcessor\Models;

class DivisorOperator extends Operator
{
    public function symbol(): string
    {
        return '/';
    }


    public function canOperateWith(Argument $argument): bool
    {
        return $this->isArithmetic($argument);
    }
}