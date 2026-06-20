<?php

namespace App\Controllers\Portal;

use App\Controllers\BaseController;
use App\Middleware\AuthMiddleware;

final class PortalController extends BaseController
{
    public function index(): void
    {
        AuthMiddleware::check();
        $modules = array_values(array_filter(require BASE_PATH . '/config/modules.php', fn($m) => !empty($m['enabled'])));
        $this->view('portal/index', ['title' => 'Portail modules', 'modules' => $modules, 'active' => 'portal']);
    }
}
