<?php

namespace FileProcessor\Exceptions;

class CanNotUseParameterInOperation extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 400, null);
    }
}