<?php

// Load default settings
$settings = require dirname(__DIR__) . '/app/defaults.php';

// Overwrite default settings with environment specific local settings
$configFiles = sprintf('%s/{local.%s,env,../../env}.php', __DIR__, $settings['env']);

if (!defined('GLOB_BRACE')) {
    define('GLOB_BRACE', 1024);
}

foreach (glob($configFiles, GLOB_BRACE) as $file) {
    $local = require $file;
    if (is_callable($local)) {
        $settings = $local($settings);
    }
}

return $settings;
