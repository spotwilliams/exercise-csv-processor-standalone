<?php

class App
{
    private array $routes;

    public function __construct()
    {
        $this->routes = [
            [
                'method' => 'GET',
                'url' => '/index',
                'controller' => function () {
                    return (new \App\Controllers\IndexController())->__invoke();
                },
            ],
            [
                'method' => 'GET',
                'url' => '/dashboard',
                'controller' => function () {
                    return (new \App\Controllers\DashboardController())->__invoke(
                        new \FileProcessor\Repositories\ProductReadRepository(),
                        new \FileProcessor\Repositories\FormulaReadRepository()
                    );
                },
            ],
            [
                'method' => 'POST',
                'url' => '/upload',
                'controller' => function () {
                    $service = new \FileProcessor\Services\FileProcessor(
                        new \FileProcessor\Repositories\ProductWriteRepository()
                    );
                    return (new \App\Controllers\UploadFileController())->__invoke($service, $_FILES);
                },
            ],
            [
                'method' => 'POST',
                'url' => '/column',
                'controller' => function () {
                    return (new \App\Controllers\AddNewColumnController())->__invoke(
                        new \FileProcessor\Services\FormulaCreator(
                            new \FileProcessor\Repositories\FormulaWriteRepository()
                        ),
                        $_POST
                    );
                },
            ],
            [
                'method' => 'GET',
                'url' => '/column',
                'controller' => function () {
                    return (new \App\Controllers\AddNewColumnFormController())->__invoke();
                },
            ]
        ];
    }

    public function execute()
    {
        $url = trim($_SERVER["REQUEST_URI"]);
        $method = $_SERVER["REQUEST_METHOD"];

        foreach ($this->routes as $route) {
            if ($url === $route['url'] && $method === $route['method']) {

                return call_user_func($route['controller']);
            }
        }
        return 'Not Found';
    }
}
