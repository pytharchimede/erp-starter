<?php

namespace App\Middleware;

use App\Helpers\Auth;

final class AuthMiddleware
{
    public static function check(): void
    {
        if (!Auth::check()) {
            header('Location: ' . \App\Helpers\View::url('login'));
            exit;
        }
    }
}
