<?php

namespace App\Controllers;

class IndexController extends Controller
{
    public function __invoke()
    {
        return $this->render(['name' => 'hola']);
    }

    public function viewName(): string
    {
        return 'upload-file';
    }
}