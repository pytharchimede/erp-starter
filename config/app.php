<?php

return [
    'name' => getenv('APP_NAME') ?: 'ERP Starter',
    'tagline' => 'Socle PHP natif framework-like pour ERP métier.',
    'url' => getenv('APP_URL') ?: 'http://localhost:8000',
    'env' => getenv('APP_ENV') ?: 'local',
    'debug' => (bool) (getenv('APP_DEBUG') ?: true),
    'theme' => [
        'primary' => '#1d2b57',
        'secondary' => '#fabd02',
    ],
];
