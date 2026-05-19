<?php

/**
 * Vercel router for PHP pages under /user, /farmer, and /officers.
 * Only files in /api are executed as serverless functions on Vercel.
 */
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$uri = '/' . ltrim(str_replace('\\', '/', rawurldecode($uri)), '/');

if (!preg_match('#^/(user|farmer|officers)/(.+\.php)$#i', $uri, $matches)) {
    http_response_code(404);
    echo 'Not found';
    exit;
}

$role = $matches[1];
$script = basename($matches[2]);
$target = realpath(__DIR__ . '/../' . $role . '/' . $script);

$base = realpath(__DIR__ . '/../' . $role);
if ($target === false || $base === false || !str_starts_with($target, $base . DIRECTORY_SEPARATOR)) {
    http_response_code(404);
    echo 'Not found';
    exit;
}

require $target;
