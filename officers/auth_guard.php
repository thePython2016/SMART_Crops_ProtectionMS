<?php

declare(strict_types=1);

$guard = __DIR__ . '/../includes/auth_guard.php';
if (!is_file($guard)) {
    $guard = __DIR__ . '/../user/includes/auth_guard.php';
}
require_once $guard;
