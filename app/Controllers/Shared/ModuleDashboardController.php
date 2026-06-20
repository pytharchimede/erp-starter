<?php

namespace App\Controllers\Shared;

use App\Controllers\BaseController;
use App\Middleware\AuthMiddleware;

final class ModuleDashboardController extends BaseController
{
    public function show(string $slug): void
    {
        AuthMiddleware::check();
        $modules = require BASE_PATH . '/config/modules.php';
        $module = array_values(array_filter($modules, fn($m) => $m['slug'] === $slug))[0] ?? null;
        if (!$module) {
            http_response_code(404);
            require BASE_PATH . '/views/errors/404.php';
            return;
        }
        $this->view('modules/dashboard', ['title' => $module['name'], 'module' => $module, 'active' => $slug]);
    }
}
