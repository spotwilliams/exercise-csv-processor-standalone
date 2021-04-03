<?php

class Secure
{
    public function secureApp(App $app)
    {
        if (!isset($_SESSION['user_id']) && !$this->isLogin()) {
            header('Location: /login');
        }

        return $app->execute();
    }

    private function isLogin(): bool
    {
        $url = trim($_SERVER["REQUEST_URI"]);

        return $url === '/login';
    }
}
