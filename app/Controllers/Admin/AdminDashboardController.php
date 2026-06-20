<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Middleware\AdminMiddleware;

final class AdminDashboardController extends BaseController
{
    public function index(): void
    {
        AdminMiddleware::check();
        $modules = require BASE_PATH . '/config/modules.php';
        $this->view('admin/dashboard', ['title' => 'Administration', 'modules' => $modules, 'active' => 'admin']);
    }

    public function maintenance(): void
    {
        AdminMiddleware::check();
        $_SESSION['maintenance_modules'] = array_values($_POST['maintenance'] ?? []);
        $this->redirect('/admin');
    }
}
