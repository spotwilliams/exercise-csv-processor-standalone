<?php

namespace App\Controllers;

class LoginFormController extends Controller
{
    public function __invoke()
    {
        return $this->render();
    }

    public function viewName(): string
    {
        return 'login';
    }
}