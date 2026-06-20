<?php

namespace App\Helpers;

final class View
{
    public static function e(mixed $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }

    public static function url(string $path = ''): string
    {
        $config = require BASE_PATH . '/config/app.php';
        return rtrim($config['url'], '/') . '/' . ltrim($path, '/');
    }

    public static function asset(string $path): string
    {
        $config = require BASE_PATH . '/config/app.php';
        return rtrim($config['url'], '/') . '/assets/' . ltrim($path, '/');
    }
}
