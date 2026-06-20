<?php

namespace App\Middleware;

use App\Helpers\Auth;

final class GuestMiddleware
{
    public static function check(): void
    {
        if (Auth::check()) {
            header('Location: ' . \App\Helpers\View::url('portail'));
            exit;
        }
    }
}
