<?php

namespace App\Middleware;

final class PermissionMiddleware
{
    public static function authorize(string $entity, string $action): void
    {
        // Hook universel : brancher ici ACL DB, policies ou permissions par rôle.
    }
}
