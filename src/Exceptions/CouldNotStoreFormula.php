<?php


namespace FileProcessor\Exceptions;

use \FileProcessor\Models\Formula;

class CouldNotStoreFormula extends \Exception
{
    public function __construct(Formula $formula, \Exception $e)
    {
        parent::__construct("The column with name `{$formula->getName()}` could not be registered");
    }
}