<?php

/**
 * Vercel / user-scoped bootstrap: use shared includes/db.php from project root.
 */
$sharedDb = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'db.php';

if (!is_file($sharedDb)) {
    if (PHP_SAPI !== 'cli') {
        http_response_code(503);
    }
    die(
        'Database bootstrap not found. Deploy the full repository (includes/db.php at project root) '
        . 'or set DATABASE_URL in Vercel environment variables.'
    );
}

require_once $sharedDb;
