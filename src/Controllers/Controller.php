<?php

namespace App\Controllers;

use App\Core\Db;

class Controller
{
    protected array $settings;

    public function __construct()
    {
        $this->settings = require dirname(__DIR__, 2) . '/app/settings.php';
    }
}