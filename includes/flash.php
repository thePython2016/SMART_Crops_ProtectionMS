<?php

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

/**
 * @param array<string, string> $fieldErrors HTML name attribute => message (shown next to that field)
 */
if (!function_exists('app_flash_field_errors')) {
    function app_flash_field_errors(array $fieldErrors): void
    {
        app_ensure_session();
        $_SESSION['form_field_errors'] = $fieldErrors;
    }
}
