<?php

namespace App\Middleware;

use App\Helpers\Auth;

final class AdminMiddleware
{
    public static function check(): void
    {
        if (!Auth::check() || (Auth::user()['role'] ?? '') !== 'admin') {
            http_response_code(403);
            require BASE_PATH . '/views/errors/403.php';
            exit;
        }
    }
}
