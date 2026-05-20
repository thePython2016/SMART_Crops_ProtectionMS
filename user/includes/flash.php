<?php

declare(strict_types=1);

if (function_exists('app_flash_success')) {
    return;
}

$repoFlash = dirname(__DIR__, 2) . '/includes/flash.php';
if (is_file($repoFlash) && realpath($repoFlash) !== realpath(__FILE__)) {
    require_once $repoFlash;
    return;
}

function app_ensure_session(): void
{
    if (!function_exists('app_session_start')) {
        require_once __DIR__ . '/app.php';
    }
    app_session_start();
}

function app_flash_success(string $message): void
{
    app_ensure_session();
    $_SESSION['form_success'] = $message;
}

function app_flash_error(string $message): void
{
    app_ensure_session();
    $_SESSION['form_error'] = $message;
}
