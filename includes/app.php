<?php

/**
 * Application base path helpers (supports /crops2 and /crops2/api entry points).
 */
function app_is_user_root_deploy(): bool
{
    return basename(dirname(__DIR__)) === 'user'
        && is_file(dirname(__DIR__) . '/user.php')
        && is_file(dirname(__DIR__) . '/connection.php');
}

function app_base_path(): string
{
    $script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '/index.php');
    $dir = rtrim(dirname($script), '/');

    if ($dir === '.' || $dir === '/') {
        $dir = '';
    }

    if (str_ends_with($dir, '/api')) {
        $dir = substr($dir, 0, -4);
    }

    return $dir;
}

function app_url(string $path = ''): string
{
    $base = app_base_path();
    $path = ltrim(str_replace('\\', '/', $path), '/');

    if ($path === '') {
        return ($base === '' ? '' : $base) . '/';
    }

    return ($base === '' ? '' : $base) . '/' . $path;
}

function app_redirect(string $path): void
{
    header('Location: ' . app_url($path), true, 302);
    exit;
}

/** Public asset path (css, img, fonts, etc.) always relative to project root. */
function app_asset(string $path): string
{
    $path = ltrim(str_replace('\\', '/', $path), '/');

    if (app_is_user_root_deploy()) {
        $parent = dirname(__DIR__);
        if (is_file($parent . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $path)) {
            return app_url('../' . $path);
        }
    }

    return app_url($path);
}

/** Form action URL for the login page (works on / and /api/index.php). */
function app_login_action(): string
{
    $script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '/index.php');

    if (str_ends_with($script, '/api/index.php')) {
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
        if ($uri === '/' || $uri === '/api' || $uri === '/api/') {
            return '/';
        }
        return app_url('api/index.php');
    }

    return app_url('index.php');
}
