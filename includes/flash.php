<?php

function app_ensure_session(): void
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
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
