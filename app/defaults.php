<?php

// Application default settings

// Error reporting
error_reporting(0);
ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');

// Timezone
date_default_timezone_set(getenv('APP_TIMEZONE') ?? 'UTC');

$settings = [];

// Environment
$settings['env'] = getenv('APP_ENV') ?? $_SERVER['APP_ENV'] ?? 'dev';
$settings['views'] = dirname(__DIR__) . '/views/';

// Database settings
$settings['db'] = [
    'driver' => 'mysql',
    'host' => getenv('APP_HOST') ?? 'localhost',
    'encoding' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'quoteIdentifiers' => true,
    'timezone' => getenv('APP_TIMEZONE') ?? 'UTC',
    'cacheMetadata' => false,
    'log' => false,
    'flags' => [
        PDO::ATTR_PERSISTENT => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => true,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_STRINGIFY_FETCHES => true,
    ],
];

return $settings;
