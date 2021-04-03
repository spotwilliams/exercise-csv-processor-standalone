<?php

namespace FileProcessor\Models;

class Argument
{
    private $value;

    public function __construct($value)
    {
        $this->value = trim($value);
        $this->assertValue();
    }

    public function getValue()
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }

    private function assertValue()
    {
        if (preg_match('/[\'^£$%*()}{@#~?><>,|=_+¬-]/', $this->value)) {
            throw new \InvalidArgumentException('The value of the argument is not valid');
        }
    }
}