<?php

namespace App\Controllers\Error;

final class ErrorController
{
    public function notFound(string $path): void { http_response_code(404); $message = $path; require BASE_PATH . '/views/errors/404.php'; }
    public function maintenance(array $state): void { http_response_code(503); require BASE_PATH . '/views/errors/maintenance.php'; }
}
