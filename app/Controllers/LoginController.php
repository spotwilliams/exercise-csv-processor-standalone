<?php


namespace App\Controllers;


use FileProcessor\Repositories\UserReadRepository;

class LoginController extends Controller
{
    public function __invoke(UserReadRepository $userReadRepository, array $inputs)
    {
        $user = $userReadRepository->findByUsername($inputs['username']);

        try {
            if ($user && password_verify($inputs['password'], $user->getPasswordHash())) {
                $_SESSION['user_id'] = $user->getId();
                header('Location: /index');
            } else {
                return $this->render(['error' => 'Credentials does not match with our records.']);
            }
        } catch (\Exception $e) {
            return $this->render(['error' => $e->getMessage()]);
        }
    }

    public function viewName(): string
    {
        return 'login';
    }
}