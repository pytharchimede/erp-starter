<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Helpers\Auth;
use App\Helpers\Csrf;
use App\Middleware\GuestMiddleware;

final class AuthController extends BaseController
{
    public function login(): void
    {
        GuestMiddleware::check();
        $this->view('auth/login', ['title' => 'Connexion']);
    }

    public function authenticate(): void
    {
        if (!Csrf::verify($_POST['_csrf'] ?? null)) {
            $this->view('auth/login', ['title' => 'Connexion', 'error' => 'Session expirée.']);
            return;
        }
        Auth::login([
            'id' => 1,
            'name' => $_POST['email'] ?: 'Administrateur',
            'email' => $_POST['email'] ?: 'admin@example.test',
            'role' => 'admin',
        ]);
        $this->redirect('/portail');
    }

    public function logout(): void
    {
        Auth::logout();
        $this->redirect('/login');
    }
}
