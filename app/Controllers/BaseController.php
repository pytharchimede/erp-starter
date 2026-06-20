<?php

namespace App\Controllers;

use App\Support\ViewBag;

abstract class BaseController
{
    protected function view(string $view, array $data = []): void
    {
        $data = array_replace(ViewBag::defaults(), $data);
        extract($data, EXTR_SKIP);
        require BASE_PATH . '/views/' . $view . '.php';
    }

    protected function redirect(string $path): void
    {
        $config = require BASE_PATH . '/config/app.php';
        header('Location: ' . rtrim($config['url'], '/') . '/' . ltrim($path, '/'));
        exit;
    }
}
