<?php


namespace FileProcessor\Exceptions;

class OperationInvalid extends \Exception
{
    public function __construct()
    {
        parent::__construct("The operation you're trying to do is not available");
    }
}