<?php
/**
 * App bootstrap for dashboard pages under user/.
 * Monorepo: delegate to repository-root includes/app.php (single canonical copy).
 * Vercel Root Directory = user: this file is the only copy (definitions below).
 */
declare(strict_types=1);

if (function_exists('app_discard_output_buffers')) {
    return;
}

$repoApp = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'app.php';
if (is_file($repoApp) && realpath($repoApp) !== realpath(__FILE__)) {
    require_once $repoApp;
    return;
}

/**
 * Application base path helpers (supports /crops2 and /crops2/api entry points).
 */
if (!function_exists('app_discard_output_buffers')) {
    function app_discard_output_buffers(): void
    {
        while (ob_get_level() > 0) {
            ob_end_clean();
        }
    }
}

if (!function_exists('app_session_start')) {
    function app_session_start(): void
    {
        if (ob_get_level() === 0) {
            ob_start();
        }
        if (session_status() === PHP_SESSION_NONE) {
            $secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
                || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');
            session_set_cookie_params([
                'lifetime' => 0,
                'path' => '/',
                'secure' => $secure,
                'httponly' => true,
                'samesite' => 'Lax',
            ]);
            session_start();
        }
    }
}

if (!function_exists('app_require_auth')) {
    function app_require_auth(): void
    {
        app_session_start();
        if (!isset($_SESSION['username'])) {
            app_redirect_login();
        }
    }
}

if (!function_exists('app_json_response')) {
    function app_json_response(array $payload, int $status = 200): void
    {
        app_discard_output_buffers();
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($payload);
        exit;
    }
}

if (!function_exists('app_is_user_root_deploy')) {
    function app_is_user_root_deploy(): bool
    {
        $root = dirname(__DIR__);

        return is_file($root . '/user.php')
            && is_file($root . '/connection.php')
            && !is_file($root . '/user/user.php');
    }
}

if (!function_exists('app_base_path')) {
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
}

if (!function_exists('app_url')) {
    function app_url(string $path = ''): string
    {
        $base = app_base_path();
        $path = ltrim(str_replace('\\', '/', $path), '/');

        if ($path === '') {
            return ($base === '' ? '' : $base) . '/';
        }

        return ($base === '' ? '' : $base) . '/' . $path;
    }
}

if (!function_exists('app_redirect')) {
    function app_redirect(string $path): void
    {
        app_discard_output_buffers();
        header('Location: ' . app_url($path), true, 302);
        exit;
    }
}

if (!function_exists('app_redirect_login')) {
    function app_redirect_login(): void
    {
        app_discard_output_buffers();
        header('Location: ' . app_login_action(), true, 302);
        exit;
    }
}

if (!function_exists('app_asset')) {
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
}

if (!function_exists('app_dashboard_path')) {
    function app_dashboard_path(int $level): string
    {
        if (app_is_user_root_deploy()) {
            return match ($level) {
                1 => 'user.php',
                2 => '../farmer/user.php',
                3 => '../officers/user.php',
                default => 'user.php',
            };
        }

        return match ($level) {
            1 => 'user/user.php',
            2 => 'farmer/user.php',
            3 => 'officers/user.php',
            default => 'user/user.php',
        };
    }
}

if (!function_exists('app_login_action')) {
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

        if (app_is_user_root_deploy()) {
            return app_url('api/index.php');
        }

        return '/';
    }
}
