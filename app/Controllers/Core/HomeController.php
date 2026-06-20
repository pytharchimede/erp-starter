<?php

namespace App\Controllers\Core;

use App\Controllers\BaseController;

final class HomeController extends BaseController
{
    public function index(): void
    {
        $config = require BASE_PATH . '/config/app.php';
        $this->view('site/home', ['title' => $config['name'], 'config' => $config]);
    }
}
