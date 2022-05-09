<?php

return [
    'paths' => [
        'enterprises/*',
        'api/*', 
        'admin/api/*', 
        'sanctum/csrf-cookie'
    ],
    'allowed_methods' => [ //'GET, POST, PUT, PATCH, DELETE, OPTIONS'
        'GET', 
        'POST', 
        'PUT', 
        'PATCH', 
        'DELETE', 
        'OPTIONS'
    ],
    'allowed_origins' => ['*'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => [
        'Origin', 
        'X-Requested-With', 
        'Content-Type', 
        'Accept', 
        'X-Auth-Token', 
        'X-CSRF-TOKEN', 
        'Authorization'
    ],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];