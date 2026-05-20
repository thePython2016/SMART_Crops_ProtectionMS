<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/app.php';
app_session_start();
$_SESSION = [];
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}
app_redirect_login();

