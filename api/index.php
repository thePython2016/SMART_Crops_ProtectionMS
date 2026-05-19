<?php

declare(strict_types=1);

ob_start();

/**
 * Vercel entry point (see vercel.json). Also works on XAMPP at /crops2/api/index.php.
 */
require_once __DIR__ . '/../includes/app.php';
require_once __DIR__ . '/../includes/login_auth.php';
require_once __DIR__ . '/../connection.php';

$login_error = '';

if (isset($_POST['login']) && !app_handle_login($conn)) {
    $login_error = 'Invalid username or password. Please try again.';
}

$login_action = app_login_action();
require __DIR__ . '/../includes/login_page.php';
