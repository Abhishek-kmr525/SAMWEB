<?php
declare(strict_types=1);

return [
    'site' => [
        'name' => 'Sam Sustained Acoustic Medicine',
        'base_url' => 'https://samrecover.com',
        'support_email' => 'support@example.com',
        'support_name' => 'SAM Recover Support',
        'admin_email' => 'admin@example.com',
    ],
    'admin' => [
        'username' => 'CHANGE_ME',
        'password' => 'CHANGE_ME_TO_A_LONG_RANDOM_PASSWORD',
    ],
    'database' => [
        'path' => __DIR__ . '/../storage/samrecover.sqlite',
    ],
    'smtp' => [
        'host' => 'smtp.example.com',
        'port' => 465,
        'secure' => 'ssl',
        'username' => 'CHANGE_ME',
        'password' => 'CHANGE_ME',
        'from_email' => 'support@example.com',
        'from_name' => 'SAM Recover Support',
    ],
];
