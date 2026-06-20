<?php

return [
    'driver' => getenv('DB_DRIVER') ?: 'sqlite',
    'sqlite_path' => getenv('DB_SQLITE_PATH') ?: BASE_PATH . '/storage/database.sqlite',
    'host' => getenv('DB_HOST') ?: '127.0.0.1',
    'database' => getenv('DB_DATABASE') ?: 'erp_starter',
    'username' => getenv('DB_USERNAME') ?: 'root',
    'password' => getenv('DB_PASSWORD') ?: '',
    'charset' => 'utf8mb4',
];
