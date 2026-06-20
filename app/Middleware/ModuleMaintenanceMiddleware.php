<?php

namespace App\Middleware;

final class ModuleMaintenanceMiddleware
{
    public static function stateForPath(string $path): ?array
    {
        $modules = $_SESSION['maintenance_modules'] ?? [];
        $slug = trim(explode('/', trim($path, '/'))[0] ?? '', '/');
        if ($slug === '' || !in_array($slug, $modules, true)) return null;
        return ['slug' => $slug, 'message' => 'Ce module est temporairement en maintenance.'];
    }
}
