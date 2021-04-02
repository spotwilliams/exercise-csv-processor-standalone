<?php

namespace App\Controllers;

abstract class Controller
{
    /**
     * @param array $vars
     * @return mixed
     */
    protected function render(array $vars = [])
    {
        extract($vars);

        ob_start();

        require(__DIR__ . "/../views/{$this->viewName()}.php");

        return ob_get_clean();
    }

    abstract public function viewName(): string;
}