<?php

namespace App\Controllers;

class AddNewColumnFormController extends Controller
{
    public function __invoke()
    {
        return $this->render();
    }

    public function viewName(): string
    {
        return 'column';
    }
}