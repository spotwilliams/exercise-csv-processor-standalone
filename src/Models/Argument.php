<?php

namespace FileProcessor\Models;

class Argument
{
    private $value;

    public function __construct($value)
    {
        $this->value = trim($value);
    }

    public function getValue()
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }
}