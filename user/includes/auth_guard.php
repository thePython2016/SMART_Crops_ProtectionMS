<?php

declare(strict_types=1);

if (!function_exists('app_discard_output_buffers')) {
    $paths = [
        dirname(__DIR__, 2) . '/includes/app.php',
        __DIR__ . '/app.php',
    ];
    foreach ($paths as $app) {
        if (is_file($app)) {
            require_once $app;
            break;
        }
    }
}

app_require_auth();
