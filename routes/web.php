<?php

use App\Controllers\Admin\AdminDashboardController;
use App\Controllers\Auth\AuthController;
use App\Controllers\Core\HomeController;
use App\Controllers\Portal\PortalController;
use App\Controllers\Shared\ModuleDashboardController;

$router->get('/', [HomeController::class, 'index']);
$router->get('/site', [HomeController::class, 'index']);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'authenticate']);
$router->post('/logout', [AuthController::class, 'logout']);

$router->get('/portail', [PortalController::class, 'index']);

$router->get('/admin', [AdminDashboardController::class, 'index']);
$router->post('/admin/maintenance', [AdminDashboardController::class, 'maintenance']);

$router->get('/modules/{slug}', [ModuleDashboardController::class, 'show']);
