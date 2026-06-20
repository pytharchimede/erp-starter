<?php

namespace App;

use App\Controllers\Error\ErrorController;
use App\Middleware\ModuleMaintenanceMiddleware;

final class Router
{
    private array $routes = [];
    private array $groupPrefixes = [];

    public function get(string $uri, callable|array $action): void { $this->add('GET', $uri, $action); }
    public function post(string $uri, callable|array $action): void { $this->add('POST', $uri, $action); }

    public function group(string $prefix, callable $callback): void
    {
        $this->groupPrefixes[] = trim($prefix, '/');
        try { $callback($this); } finally { array_pop($this->groupPrefixes); }
    }

    private function add(string $method, string $uri, callable|array $action): void
    {
        $prefix = implode('/', array_filter($this->groupPrefixes));
        $path = '/' . trim(($prefix ? $prefix . '/' : '') . trim($uri, '/'), '/');
        $this->routes[] = ['method' => $method, 'uri' => $path === '/' ? '/' : rtrim($path, '/'), 'action' => $action];
    }

    public function dispatch(string $requestUri, string $method): void
    {
        $path = $this->normalize($requestUri);
        if ($state = ModuleMaintenanceMiddleware::stateForPath($path)) {
            (new ErrorController())->maintenance($state);
            return;
        }
        foreach ($this->routes as $route) {
            if ($route['method'] !== strtoupper($method)) continue;
            $params = $this->match($route['uri'], $path);
            if ($params !== null) { $this->run($route['action'], $params); return; }
        }
        (new ErrorController())->notFound($path);
    }

    private function run(callable|array $action, array $params): void
    {
        if (is_callable($action)) { $action(...$params); return; }
        [$class, $method] = $action;
        (new $class())->$method(...$params);
    }

    private function match(string $route, string $path): ?array
    {
        $names = [];
        $pattern = preg_replace_callback('/\\{([a-zA-Z_][a-zA-Z0-9_]*)\\}/', static function ($m) use (&$names) {
            $names[] = $m[1]; return '([^/]+)';
        }, preg_quote($route, '#'));
        if (!preg_match('#^' . $pattern . '$#', $path, $matches)) return null;
        array_shift($matches);
        return array_map('rawurldecode', $matches);
    }

    private function normalize(string $uri): string
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $script = $_SERVER['SCRIPT_NAME'] ?? '';
        $base = str_replace('/index.php', '', $script);
        if ($base && str_starts_with($path, $base)) $path = substr($path, strlen($base));
        return $path === '/' ? '/' : rtrim($path, '/');
    }
}
