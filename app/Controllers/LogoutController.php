<?php


namespace App\Controllers;

class LogoutController extends Controller
{
    public function __invoke()
    {
        session_unset();
        session_destroy();
        return $this->render();
    }

    public function viewName(): string
    {
        return 'login';
    }
}