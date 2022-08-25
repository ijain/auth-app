<?php

// Dev environment

return function (array $settings): array {
    $settings['error']['display_error_details'] = true;
    $settings['logger']['level'] = 0;

    // Database
    $settings['db']['database'] = getenv('DB_NAME') ?? '';

    return $settings;
};
