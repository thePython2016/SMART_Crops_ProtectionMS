<?php

declare(strict_types=1);

if (function_exists('app_flash_success')) {
    return;
}

// Prefer canonical helpers from repo root when this file is a shim.
$repoFlash = dirname(__DIR__, 2) . '/includes/flash.php';
if (is_file($repoFlash) && realpath($repoFlash) !== realpath(__FILE__)) {
    require_once $repoFlash;
    return;
}

if (!function_exists('app_ensure_session')) {
    function app_ensure_session(): void
    {
        if (!function_exists('app_session_start')) {
            require_once __DIR__ . '/app.php';
        }
        app_session_start();
    }
}

if (!function_exists('app_flash_success')) {
    function app_flash_success(string $message): void
    {
        app_ensure_session();
        $_SESSION['form_success'] = $message;
    }
}

if (!function_exists('app_flash_error')) {
    function app_flash_error(string $message): void
    {
        app_ensure_session();
        $_SESSION['form_error'] = $message;
    }
}

if (!function_exists('app_flash_field_errors')) {
    /**
     * @param array<string, string> $fieldErrors
     */
    function app_flash_field_errors(array $fieldErrors): void
    {
        app_ensure_session();
        $_SESSION['form_field_errors'] = $fieldErrors;
    }
}
