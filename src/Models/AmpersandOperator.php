<?php

namespace FileProcessor\Models;

class AmpersandOperator extends Operator
{
    public function symbol(): string
    {
        return '&';
    }

    public function apply(array $arguments): string
    {
        $result = array_reduce($arguments, function($carry, Argument $argument) {
            $carry .= str_replace('"', "'", $argument->getValue()) . ',';

            return $carry;
        }, '');

        return 'concat(' . mb_substr($result, 0, -1) . ')';
    }

    public function canOperateWith(Argument $argument): bool
    {
        return true;
    }
}