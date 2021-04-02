<?php

namespace FileProcessor\Models;

use FileProcessor\Exceptions\CanNotUseParameterInOperation;

class Formula
{
    private Operator $operator;
    /** @var Argument[] */
    private array $arguments;
    private string $name;

    public function __construct(string $name, Operator $operator, array $arguments)
    {
        $this->operator = $operator;
        $this->arguments = $arguments;
        $this->name = trim($name);
        $this->assertArgumentCompatibility();
        $this->assertName();
    }

    public function calculate()
    {
        return $this->operator->apply($this->arguments);
    }

    private function assertArgumentCompatibility(): bool
    {
        foreach ($this->arguments as $argument) {
            if (!$this->operator->canOperateWith($argument)) {
                throw new CanNotUseParameterInOperation("The paramenter `{$argument->getValue()}` can not be used to add");
            }
        }
        return true;
    }


    public function getOperator(): Operator
    {
        return $this->operator;
    }

    public function getArgumentsAsArray(): array
    {
        return array_map(function (Argument $argument) {
            return $argument->getValue();
        }, $this->arguments);
    }

    public function getName(): string
    {
        return $this->name;
    }

    private function assertName(): bool
    {
        if (strrpos($this->name, ' ') !== false or $this->name === '') {
            throw new \InvalidArgumentException("The name of the rule must not have whitespaces nor empty");
        }
        return true;
    }
}