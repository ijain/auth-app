<?php

// Secret credentials

return function (array $settings): array {

    $settings['db']['host'] = getenv('DB_HOST') ?? 'localhost';
    $settings['db']['port'] = getenv('DB_PORT') ?? '3306';
    $settings['db']['username'] = getenv('DB_USER') ?? '';
    $settings['db']['password'] = getenv('DB_PASSWORD') ?? '';

    if (defined('PHPUNIT_COMPOSER_INSTALL')) {
        // PHPUnit test database
        $settings['db']['database'] = getenv('DB_NAME') ?? '';
    } else {
        // Local dev database
        $settings['db']['database'] = getenv('DB_NAME') ?? '';
    }

    return $settings;
};
